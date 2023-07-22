<?php

function donhang_by_kh_all($ma_kh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "SELECT don_hang.ma_dh, don_hang.ngay_dat, don_hang.danh_gia_don_hang, trang_thai.ma_trang_thai, trang_thai.ten_trang_thai, don_vi_van_chuyen.ten_van_chuyen, chi_tiet_don_hang.so_luong, hang_hoa.ten_hh, chi_tiet_hang_hoa.ma_cthh, chi_tiet_hang_hoa.giam_gia, chi_tiet_hang_hoa.don_gia, chi_tiet_hang_hoa.don_vi, hinh_hang_hoa.ma_hinh, hinh_hang_hoa.ten_hinh
    FROM don_hang 
    JOIN chi_tiet_don_hang ON don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
    JOIN trang_thai ON don_hang.ma_trang_thai = trang_thai.ma_trang_thai 
    JOIN don_vi_van_chuyen ON don_hang.ma_van_chuyen = don_vi_van_chuyen.ma_van_chuyen 
    JOIN chi_tiet_hang_hoa ON chi_tiet_don_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh
    JOIN hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh
    JOIN hinh_hang_hoa ON hang_hoa.ma_hh = hinh_hang_hoa.ma_hh
    WHERE ma_kh = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $orders = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $orderID = $row['ma_dh'];
        $ma_cthh = $row['ma_cthh'];
        $ma_hinh = $row['ma_hinh'];
        if(!isset($orders[$orderID])) {
            $orders[$orderID] = [
                'ma_dh' => $row['ma_dh'],
                'ngay_dat' => $row['ngay_dat'],
                'ngay_dat' => $row['ngay_dat'],
                'danh_gia_don_hang' => $row['danh_gia_don_hang'],
                'ma_trang_thai' => $row['ma_trang_thai'],
                'ten_trang_thai' => $row['ten_trang_thai'],
                'ten_van_chuyen' => $row['ten_van_chuyen'],
                'products' => [],
            ];
        }
        if(!isset($orders[$orderID]['products'][$ma_cthh])) {
            $orders[$orderID]['products'][$ma_cthh] = [
                'ten_hh' => $row['ten_hh'],
                'giam_gia' => $row['giam_gia'],
                'don_gia' => $row['don_gia'],
                'don_vi' => $row['don_vi'],
                'so_luong' => $row['so_luong'],
                'hinhArr' => [],
            ];
        }
        if(!isset($orders[$orderID]['products'][$ma_cthh]['hinhArr'][$ma_hinh])) {
            $orders[$orderID]['products'][$ma_cthh]['hinhArr'][$ma_hinh] = $row['ten_hinh'];
        }
    }

    // echo "<pre>";
    // print_r($orders);
    return $orders;
}

function donhang_by_id($ma_dh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "SELECT don_hang.ma_dh, don_hang.ngay_dat, don_hang.ten_nguoi_nhan, don_hang.sdt_nguoi_nhan, don_hang.dia_chi_nhan, don_hang.tong_tien, don_hang.ghi_chu, trang_thai.ten_trang_thai, don_vi_van_chuyen.ten_van_chuyen, don_vi_van_chuyen.gia_van_chuyen, hang_hoa.ma_hh, hang_hoa.ten_hh, chi_tiet_hang_hoa.don_gia, chi_tiet_hang_hoa.giam_gia, chi_tiet_hang_hoa.don_vi, hinh_hang_hoa.ma_hinh, hinh_hang_hoa.ten_hinh, chi_tiet_don_hang.so_luong
    FROM don_hang 
    JOIN chi_tiet_don_hang ON don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
    JOIN trang_thai ON don_hang.ma_trang_thai = trang_thai.ma_trang_thai 
    JOIN don_vi_van_chuyen ON don_hang.ma_van_chuyen = don_vi_van_chuyen.ma_van_chuyen 
    JOIN chi_tiet_hang_hoa ON chi_tiet_don_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh
    JOIN hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh
    JOIN hinh_hang_hoa ON hang_hoa.ma_hh = hinh_hang_hoa.ma_hh
    WHERE don_hang.ma_dh = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $orderDetail = [
        'ma_dh' => $result[0]['ma_dh'],
        'ngay_dat' => $result[0]['ngay_dat'],
        'ten_nguoi_nhan' => $result[0]['ten_nguoi_nhan'],
        'sdt_nguoi_nhan' => $result[0]['sdt_nguoi_nhan'],
        'dia_chi_nhan' => $result[0]['dia_chi_nhan'],
        'tong_tien' => $result[0]['tong_tien'],
        'ghi_chu' => $result[0]['ghi_chu'],
        'ten_trang_thai' => $result[0]['ten_trang_thai'],
        'ten_van_chuyen' => $result[0]['ten_van_chuyen'],
        'gia_van_chuyen' => $result[0]['gia_van_chuyen'],
        'products' => [],
    ];
    foreach ($result as $item) {
        $ma_hh = $item['ma_hh'];
        $ma_hinh = $item['ma_hinh'];
        if(!isset($orderDetail['products'][$ma_hh])) {
            $orderDetail['products'][$ma_hh] = [
                'ma_hh' => $item['ma_hh'],
                'ten_hh' => $item['ten_hh'],
                'giam_gia' => $item['giam_gia'],
                'don_gia' => $item['don_gia'],
                'don_vi' => $item['don_vi'],
                'so_luong' => $item['so_luong'],
                'hinhArr' => [],
            ];
        }
        if(!isset($orderDetail['products'][$ma_hh]['hinhArr'][$ma_hinh])) {
            $orderDetail['products'][$ma_hh]['hinhArr'][$ma_hinh] = $item['ten_hinh'];
        }
    }
    
    // echo "<pre>";
    // print_r($orderDetail);
    return $orderDetail;
}

function donhang_cancel_by_id($ma_dh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "UPDATE don_hang SET ma_trang_thai = '5' WHERE don_hang.ma_dh = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
}

function donhang_update_review($ma_dh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "UPDATE `don_hang` SET `danh_gia_don_hang` = '1' WHERE `don_hang`.`ma_dh` = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
}
?>
