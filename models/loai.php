<?php
//Truy vấn tất cả loại hàng
function loai_all()
{
    $conn = connection();
    $sql = "SELECT * FROM loai WHERE hoat_dong_loai = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function loai_insert($data)
{
    extract($data);
    $conn = connection();
    $sql = "INSERT INTO loai (ten_loai, hinh_loai, hoat_dong_loai) VALUES ('$ten_loai', '$hinh_loai', '1')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function loai_update($data)
{
    extract($data);
    $conn = connection();
    $sql = "UPDATE loai SET ten_loai = '$ten_loai', hinh_loai = '$hinh_loai' WHERE loai.ma_loai = $ma_loai";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function loai_delete($ma_loai)
{
    $conn = connection();
    $sql = "UPDATE loai SET hoat_dong_loai = '0' WHERE loai.ma_loai = $ma_loai";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
//Lấy ra 1 loại hàng
function loai_select_by_id($ma_loai)
{
    $conn = connection();
    $sql = "SELECT * FROM loai WHERE ma_loai=$ma_loai";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $loai = $stmt->fetch(PDO::FETCH_ASSOC);
    return $loai;
}
function loai_search($key)
{
    $conn = connection();
    $sql = "SELECT * FROM loai WHERE ten_loai LIKE '%$key%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function loai_thongke_sp()
{
    $conn = connection();
    $sql = "SELECT loai.ten_loai, 
    COUNT(*) as so_luong,
    COUNT(*) * 100.0 / total.so_luong_tong AS phan_tram
    FROM hang_hoa 
    INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai
    CROSS JOIN (SELECT COUNT(*) as so_luong_tong FROM hang_hoa) AS total
    GROUP BY hang_hoa.ma_loai, total.so_luong_tong;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
