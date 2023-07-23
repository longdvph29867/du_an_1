<?php
//Truy vấn tất cả loại hàng
function binhluan_by_mahh($ma_hh)
{
    $conn = connection();
    $sql = "SELECT binh_luan.noi_dung,binh_luan.ngay_bl,khach_hang.ho_ten,khach_hang.hinh FROM binh_luan JOIN khach_hang ON khach_hang.ma_kh=binh_luan.ma_kh WHERE ma_hh=$ma_hh ORDER BY binh_luan.ma_bl DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function binhluan_insert($data)
{
    $conn = connection();
    $sql = "INSERT INTO binh_luan (noi_dung, ma_hh, ma_kh, ngay_bl) VALUES ('$data[noi_dung]', $data[ma_hh], '$data[ma_kh]', '$data[ngay_bl]')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

?>