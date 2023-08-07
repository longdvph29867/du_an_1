<?php
//Truy vấn tất cả loại hàng
function khachhang_search($key)
{
    $conn = connection();
    $sql = "SELECT * FROM khach_hang WHERE hoat_dong = 1 AND ho_ten LIKE '%$key%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function khachhang_all()
{
    $conn = connection();
    $sql = "SELECT * FROM khach_hang WHERE hoat_dong = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
/**
 * thêm loại hàng
 * @param $data mảng chưa dữ liệu loại có key và value
 * Ví dụ: $data=['ten_loai'=>'Máy tính Dell']
 */
function khachhang_insert($ma_kh, $mat_khau, $ho_ten, $hinh, $sdt, $email)
{
    $data = [$ma_kh, $mat_khau, $ho_ten, $hinh, $sdt, $email];
    $conn = connection();
    $sql = "INSERT INTO khach_hang (ma_kh, mat_khau, ho_ten, hinh, sdt, email, vai_tro) VALUES (?, ?, ?, ?, ?, ?, '0')";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

//Lấy ra 1 loại hàng
function khachhang_select_by_id($ma_kh)
{
    $data[] = $ma_kh;
    $conn = connection();
    $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    $loai = $stmt->fetch(PDO::FETCH_ASSOC);
    return $loai;
}


function khachhang_delete($ma_kh)
{
    $data = func_get_args();
    $conn = connection();
    // $sql = "DELETE FROM khach_hang WHERE ma_kh=?";
    $sql = "UPDATE `khach_hang` SET `hoat_dong` = '0' WHERE `khach_hang`.`ma_kh` = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function khachhang_insert_ad($data)
{
    extract($data);
    $conn = connection();
    $sql = "INSERT INTO khach_hang (ma_kh, mat_khau, ho_ten, hinh, sdt, email, vai_tro) 
    VALUES ('$ma_kh', '$mat_khau', '$ho_ten', '$hinh', '$sdt', '$email', '$vai_tro')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function khachhang_update_ad($data)
{
    extract($data);
    $conn = connection();
    $sql = "UPDATE khach_hang 
    SET mat_khau = '$mat_khau', ho_ten = '$ho_ten', hinh = '$hinh', sdt = '$sdt', email = '$email', vai_tro = '$vai_tro' 
    WHERE khach_hang.ma_kh = '$ma_kh'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

// khách hàng cập nhật
function khachhang_update_password($data)
{
    extract($data);
    $conn = connection();
    $sql = "UPDATE khach_hang SET mat_khau = '$mat_khau2' WHERE khach_hang.ma_kh = '$ma_kh'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
// khách hàng cập nhật
function khachhang_update_info($data)
{
    extract($data);
    $conn = connection();
    $sql = "UPDATE khach_hang 
    SET ho_ten = '$ho_ten', hinh = '$hinh', sdt = '$sdt', email = '$email' 
    WHERE khach_hang.ma_kh = '$ma_kh'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

