<?php

function donhang_by_kh_all($ma_kh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "SELECT don_hang.ma_dh, don_hang.ngay_dat, don_hang.danh_gia_don_hang, trang_thai.ma_trang_thai, trang_thai.ten_trang_thai, don_vi_van_chuyen.ten_van_chuyen, chi_tiet_don_hang.so_luong, hang_hoa.ten_hh, hang_hoa.giam_gia, hang_hoa.don_gia, hang_hoa.hinh, hang_hoa.hinh, don_vi.ten_dv 
    FROM don_hang 
    JOIN chi_tiet_don_hang ON don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
    JOIN trang_thai ON don_hang.ma_trang_thai = trang_thai.ma_trang_thai 
    JOIN don_vi_van_chuyen ON don_hang.ma_van_chuyen = don_vi_van_chuyen.ma_van_chuyen 
    JOIN hang_hoa ON chi_tiet_don_hang.ma_hh = hang_hoa.ma_hh 
    JOIN don_vi ON hang_hoa.ma_dv = don_vi.ma_dv
    WHERE ma_kh = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $orders = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $orderID = $row['ma_dh'];
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
        array_push($orders[$orderID]['products'], 
        [
            'ten_hh' => $row['ten_hh'],
            'giam_gia' => $row['giam_gia'],
            'don_gia' => $row['don_gia'],
            'hinh' => $row['hinh'],
            'so_luong' => $row['so_luong'],
            'ten_dv' => $row['ten_dv'],
        ]);
    }

    // echo "<pre>";
    // print_r($orders );
    // echo "</pre>";

    return $orders;
}

function donhang_detail_by_id($ma_dh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "SELECT don_hang.ma_dh, don_hang.ngay_dat, don_hang.ten_nguoi_nhan, don_hang.sdt_nguoi_nhan, don_hang.dia_chi_nhan, don_hang.tong_tien, don_hang.ghi_chu, trang_thai.ten_trang_thai, don_vi_van_chuyen.ten_van_chuyen, don_vi_van_chuyen.gia_van_chuyen, hang_hoa.ten_hh, hang_hoa.don_gia, hang_hoa.giam_gia, hang_hoa.hinh, chi_tiet_don_hang.so_luong, don_vi.ten_dv
    FROM don_hang 
    JOIN chi_tiet_don_hang ON don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
    JOIN trang_thai ON don_hang.ma_trang_thai = trang_thai.ma_trang_thai 
    JOIN don_vi_van_chuyen ON don_hang.ma_van_chuyen = don_vi_van_chuyen.ma_van_chuyen 
    JOIN hang_hoa ON chi_tiet_don_hang.ma_hh = hang_hoa.ma_hh 
    JOIN don_vi ON hang_hoa.ma_dv = don_vi.ma_dv
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
        array_push($orderDetail['products'], [
            'ten_hh' => $item['ten_hh'],
            'giam_gia' => $item['giam_gia'],
            'don_gia' => $item['don_gia'],
            'hinh' => $item['hinh'],
            'so_luong' => $item['so_luong'],
            'ten_dv' => $item['ten_dv'],

        ]);
    }



    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     $orderID = $row['ma_dh'];
    //     if(!isset($orderDetail[$orderID])) {
    //         $orderDetail[$orderID] = [
    //             'ma_dh' => $row['ma_dh'],
    //             'ngay_dat' => $row['ngay_dat'],
    //             'ten_nguoi_nhan' => $row['ten_nguoi_nhan'],
    //             'sdt_nguoi_nhan' => $row['sdt_nguoi_nhan'],
    //             'dia_chi_nhan' => $row['dia_chi_nhan'],
    //             'tong_tien' => $row['tong_tien'],
    //             'ghi_chu' => $row['ghi_chu'],
    //             'ten_trang_thai' => $row['ten_trang_thai'],
    //             'ten_van_chuyen' => $row['ten_van_chuyen'],
    //             'gia_van_chuyen' => $row['gia_van_chuyen'],
    //             'products' => [],
    //         ];
    //     }
    //     array_push($orderDetail[$orderID]['products'], 
    //     [
    //         'ten_hh' => $row['ten_hh'],
    //         'giam_gia' => $row['giam_gia'],
    //         'don_gia' => $row['don_gia'],
    //         'hinh' => $row['hinh'],
    //         'so_luong' => $row['so_luong'],
    //         'ten_dv' => $row['ten_dv'],
    //     ]);
    // }

    // echo "<pre>";
    // print_r($orderDetail);
    // echo "</pre>";

    return $orderDetail;
}


function order_cancel_by_id($ma_dh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "UPDATE don_hang SET ma_trang_thai = '5' WHERE don_hang.ma_dh = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
}
?>
