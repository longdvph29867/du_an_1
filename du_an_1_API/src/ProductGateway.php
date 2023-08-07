<?php

    class ProductGateway {
        // private PDO $conn;
        private $conn;
        public function __construct(Database $database) 
        {
            $this->conn = $database->getConnection();
        }

        public function getAll($ma_kh): array
        {
            $sql = "SELECT gio_hang.*, chi_tiet_hang_hoa.so_luong AS 'so_luong_kho' FROM gio_hang INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_cthh = gio_hang.ma_cthh WHERE ma_kh = '$ma_kh'";
            $stmt = $this->conn->query($sql);
            $data = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($data, $row);
            }

            return $data;
        }

        public function create(array $data) : string
        {
            $sql = "SELECT * FROM `gio_hang` WHERE ma_kh = '$data[ma_kh]'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $temp = false;
            $quantity = 0;
            $ma_gh = 0;
            foreach($result as $item) {
                if($item['ma_cthh'] == $data["ma_cthh"]) {
                    $temp = true;
                    $ma_gh = $item['ma_gh'];
                    $quantity = $item['so_luong'];
                };
            }
            if(!empty($result) && $temp) {
                $newQuantity = $quantity + $data['so_luong'];
                $sql_Create = "UPDATE `gio_hang` SET `so_luong` = '$newQuantity' WHERE `gio_hang`.`ma_gh` = $ma_gh";
                $stmt = $this->conn->prepare($sql_Create);
                
            }
            else {
                $sql_Create = "INSERT INTO gio_hang (ma_kh, ma_cthh, so_luong) VALUES (:ma_kh, :ma_cthh, :so_luong)";
                $stmt = $this->conn->prepare($sql_Create);
    
                $stmt->bindValue(":ma_kh", $data["ma_kh"], PDO::PARAM_STR);
                $stmt->bindValue(":ma_cthh", $data["ma_cthh"], PDO::PARAM_INT);
                $stmt->bindValue(":so_luong", $data["so_luong"], PDO::PARAM_INT);
            }

            $stmt->execute();
            return $this->conn->lastInsertId();
        }

        public function get(string $id) : array
        {
            $sql = "SELECT * FROM gio_hang WHERE ma_gh = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data;
        }

        public function update(array $current, array $new) : array
        {
            $sql = "UPDATE gio_hang SET ma_kh = :ma_kh, ma_cthh = :ma_cthh, so_luong = :so_luong WHERE gio_hang.ma_gh = :ma_gh";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(":ma_kh", $new["ma_kh"] ?? $current["ma_kh"], PDO::PARAM_STR);
            $stmt->bindValue(":ma_cthh", $new["ma_cthh"] ?? $current["ma_cthh"], PDO::PARAM_INT);
            $stmt->bindValue(":so_luong", $new["so_luong"] ?? $current["so_luong"], PDO::PARAM_INT);

            $stmt->bindValue(":ma_gh", $current["ma_gh"], PDO::PARAM_INT);
            $stmt->execute();

            $sql_select = "SELECT gio_hang.*, chi_tiet_hang_hoa.ma_cthh, chi_tiet_hang_hoa.don_gia, chi_tiet_hang_hoa.giam_gia, chi_tiet_hang_hoa.don_vi, chi_tiet_hang_hoa.so_luong as 'so_luong_kho', hang_hoa.ten_hh FROM gio_hang
            INNER JOIN chi_tiet_hang_hoa ON gio_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh
            INNER JOIN hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh WHERE gio_hang.ma_gh = :ma_gh";
            $stmt_select = $this->conn->prepare($sql_select);
            $stmt_select->bindValue(":ma_gh", $current["ma_gh"], PDO::PARAM_INT);
            $stmt_select->execute();

            $updatedRow = $stmt_select->fetch(PDO::FETCH_ASSOC);
            return $updatedRow;
        }

        public function delete(string $id) : int
        {
            $sql = "DELETE FROM product WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->rowCount();
        }
    }
?>