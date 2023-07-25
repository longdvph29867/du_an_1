<?php 
function giohang_by_ma_kh($ma_kh) {
    $data = [$ma_kh];
    $conn = connection();
    $sql = "SELECT gio_hang.*, chi_tiet_hang_hoa.ma_cthh, chi_tiet_hang_hoa.don_gia, chi_tiet_hang_hoa.giam_gia, chi_tiet_hang_hoa.don_vi, chi_tiet_hang_hoa.so_luong as 'so_luong_kho', hang_hoa.ten_hh, hinh_hang_hoa.* FROM gio_hang
	INNER JOIN chi_tiet_hang_hoa ON gio_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh
    INNER JOIN hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh
	INNER JOIN hinh_hang_hoa ON hang_hoa.ma_hh = hinh_hang_hoa.ma_hh
    WHERE gio_hang.ma_kh = ? ORDER BY gio_hang.ma_gh DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

    $hangHoaArr = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $maHinh = $row['ma_hinh'];
        $maCthh = $row['ma_cthh'];
        if(!isset($hangHoaArr[$maCthh])) {
            $hangHoaArr[$maCthh] = [
                'ma_gh' => $row['ma_gh'],
                'ma_hh' => $row['ma_hh'],
                'ma_cthh' => $row['ma_cthh'],
                'ten_hh' => $row['ten_hh'],
                'don_vi' => $row['don_vi'],
                'don_gia' => $row['don_gia'],
                'giam_gia' => $row['giam_gia'],
                'so_luong' => $row['so_luong'],
                'hinhArr' => [],
            ];
        }
        if(!isset($hangHoaArr[$maCthh]['hinhArr'][$maHinh])) {
            $hangHoaArr[$maCthh]['hinhArr'][$maHinh] = $row['ten_hinh'];
        }
    }
    return $hangHoaArr;
}

function giohang_insert($data)
{
    $ma_kh = $_SESSION['user']['ma_kh'];
    $conn = connection();
    $sql = "SELECT * FROM gio_hang WHERE ma_kh = '$ma_kh'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $listGioHang = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $temp = false;
    $quantity = 0;
    $ma_gh = 0;
    foreach($listGioHang as $item) {
        if($item['ma_cthh'] == $data['ma_cthh']) {
            $temp = true;
            $ma_gh = $item['ma_gh'];
            $quantity = $item['so_luong'];
        };
    }

    if(!empty($listGioHang) && $temp) {
        $newQuantity = $quantity + $data['so_luong'];
        $sql_Update = "UPDATE `gio_hang` SET `so_luong` = '$newQuantity' WHERE `gio_hang`.`ma_gh` = $ma_gh";
        $stmt = $conn->prepare($sql_Update);
        $stmt->execute();
    }
    else {
        $sql_Create = "INSERT INTO gio_hang (ma_kh, ma_cthh, so_luong) VALUES ('$ma_kh', $data[ma_cthh], $data[so_luong])";
        $stmt = $conn->prepare($sql_Create);
        $stmt->execute();
    }
}

function gh_delete($ma_gh)
{
    $data = func_get_args();
    $conn = connection();
    $sql = "DELETE FROM gio_hang WHERE ma_gh=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}


function gh_delete_all()
{
    $conn = connection();
    $sql = "DELETE FROM gio_hang";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

//Lấy ra 1 sp trong gio hàng
function giohang_by_id($ma_gh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "SELECT gio_hang.ma_gh, gio_hang.so_luong, chi_tiet_hang_hoa.ma_cthh, chi_tiet_hang_hoa.don_vi, chi_tiet_hang_hoa.don_gia, chi_tiet_hang_hoa.giam_gia, hang_hoa.ma_hh, hang_hoa.ten_hh, hinh_hang_hoa.ma_hinh, hinh_hang_hoa.ten_hinh FROM gio_hang 
	INNER JOIN chi_tiet_hang_hoa ON gio_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh
    INNER JOIN hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh
    INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh
	WHERE gio_hang.ma_gh = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $itemDetail = [
        'ma_gh' => $result[0]['ma_gh'],
        'so_luong' => $result[0]['so_luong'],
        'ma_cthh' => $result[0]['ma_cthh'],
        'ten_hh' => $result[0]['ten_hh'],
        'don_vi' => $result[0]['don_vi'],
        'don_gia' => $result[0]['don_gia'],
        'giam_gia' => $result[0]['giam_gia'],
        'hinhArr' => [],
    ];
    foreach ($result as $item) {
        $ma_hinh = $item['ma_hinh'];
        if(!isset($itemDetail['hinhArr'][$ma_hinh])) {
            $itemDetail['hinhArr'][$ma_hinh] = $item['ten_hinh'];
        }
    }
    
    // echo "<pre>";
    // print_r($orderDetail);
    return $itemDetail;
}

?>