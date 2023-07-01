<?php

function donhang_by_kh_all($ma_kh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "SELECT don_hang.ma_dh, don_hang.ngay_dat, trang_thai.ten_trang_thai, don_vi_van_chuyen.ten_van_chuyen, chi_tiet_don_hang.so_luong, hang_hoa.ten_hh, hang_hoa.giam_gia, hang_hoa.don_gia, hang_hoa.hinh FROM don_hang JOIN chi_tiet_don_hang ON don_hang.ma_dh = chi_tiet_don_hang.ma_dh JOIN trang_thai ON don_hang.ma_trang_thai = trang_thai.ma_trang_thai JOIN don_vi_van_chuyen ON don_hang.ma_van_chuyen = don_vi_van_chuyen.ma_van_chuyen JOIN hang_hoa ON chi_tiet_don_hang.ma_hh = hang_hoa.ma_hh WHERE ma_kh = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $orders = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $orderID = $row['ma_dh'];
        if(!isset($orders[$orderID])) {
            $orders[$orderID] = [
                'ngay_dat' => $row['ngay_dat'],
                'ten_trang_thai' => $row['ten_trang_thai'],
                'ten_van_chuyen' => $row['ten_van_chuyen'],
                'products' => [],
            ];
        }
        array_push($orders[$orderID]['products'], 
        [
            'ten_hh' => $row['ten_hh'],
            'giam_gia' => $row['giam_gia'],
            'don_gia' => $row['don_gia'],
            'hinh' => $row['hinh'],
            'so_luong' => $row['so_luong'],
        ]);
    }

    // echo "<pre>";
    // print_r($orders );
    // echo "</pre>";

    return $orders;
}

?>