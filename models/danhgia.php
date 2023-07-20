<?php
//Truy vấn tất cả loại hàng
function danhgia_by_mahh($ma_hh)
{
    $conn = connection();
    $sql = "SELECT danh_gia.noi_dung_danh_gia,danh_gia.xep_hang,khach_hang.ho_ten,khach_hang.hinh FROM danh_gia JOIN khach_hang ON khach_hang.ma_kh=danh_gia.ma_kh WHERE danh_gia.ma_hh=$ma_hh;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>