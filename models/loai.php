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
/**
 * thêm loại hàng
 * @param $data mảng chưa dữ liệu loại có key và value
 * Ví dụ: $data=['ten_loai'=>'Máy tính Dell']
 */
function loai_insert($ten_loai)
{
    $data = [$ten_loai];
    $conn = connection();
    $sql = "Insert Into loai(ten_loai) Values(?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
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
function loai_delete($ma_loai)
{
    $data = func_get_args();
    $conn = connection();
    $sql = "DELETE FROM loai WHERE ma_loai=?";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
//Lấy ra 1 loại hàng
function loai_select_by_id($ma_loai)
{
    $data[] = $ma_loai;
    $conn = connection();
    $sql = "SELECT * FROM loai WHERE ma_loai=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    $loai = $stmt->fetch(PDO::FETCH_ASSOC);
    return $loai;
}
