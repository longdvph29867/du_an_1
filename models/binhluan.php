<?php
//Truy vấn tất cả loại hàng
function binhluan_by_mahh($ma_hh)
{
    $conn = connection();
    $sql = "SELECT binh_luan.noi_dung,binh_luan.ngay_bl,khach_hang.ho_ten,khach_hang.hinh FROM binh_luan JOIN khach_hang ON khach_hang.ma_kh=binh_luan.ma_kh WHERE ma_hh=$ma_hh;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>