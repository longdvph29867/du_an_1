<?php
//Truy vấn tất cả loại hàng
function loai_all()
{
    $conn = connection();
    $sql = "SELECT * FROM loai";
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
    $sql = "DELETE FROM loai WHERE ma_loai=$ma_loai";
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
