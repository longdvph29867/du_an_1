<?php
//Truy vấn tất cả loại hàng
function khachhang_all()
{
    $conn = connection();
    $sql = "SELECT * FROM khach_hang";
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




/**
 * cập nhật loại hàng theo ma_loai
 * @param $data mảng chưa dữ liệu cập nhật có key và value
 * Ví dụ: $data=['ten_loai'=>'Máy tính Dell']
 * * @param $ma_loai cần cập nhật
 */
function loai_update($ten_loai, $ma_loai)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
}
/**
 * Xóa loại hàng
 * @param $ma_loai cần xóa
 */
function khachhang_delete($ma_kh)
{
    $data = func_get_args();
    $conn = connection();
    $sql = "DELETE FROM khach_hang WHERE ma_kh=?";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

