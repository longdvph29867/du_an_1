<?php

function donhang_by_kh_all($ma_kh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "SELECT don_hang.ma_dh, don_hang.ngay_dat, don_hang.tong_tien, don_hang.danh_gia_don_hang, trang_thai.ma_trang_thai, trang_thai.ten_trang_thai, don_vi_van_chuyen.ten_van_chuyen, chi_tiet_don_hang.so_luong, hang_hoa.ten_hh, chi_tiet_hang_hoa.ma_cthh, chi_tiet_hang_hoa.giam_gia, chi_tiet_hang_hoa.don_gia, chi_tiet_hang_hoa.don_vi, hinh_hang_hoa.ma_hinh, hinh_hang_hoa.ten_hinh
    FROM don_hang 
    JOIN chi_tiet_don_hang ON don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
    JOIN trang_thai ON don_hang.ma_trang_thai = trang_thai.ma_trang_thai 
    JOIN don_vi_van_chuyen ON don_hang.ma_van_chuyen = don_vi_van_chuyen.ma_van_chuyen 
    JOIN chi_tiet_hang_hoa ON chi_tiet_don_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh
    JOIN hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh
    JOIN hinh_hang_hoa ON hang_hoa.ma_hh = hinh_hang_hoa.ma_hh
    WHERE ma_kh = ? ORDER BY don_hang.ma_dh DESC";
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
                'tong_tien' => $row['tong_tien'],
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
    $sql = "SELECT don_hang.ma_dh, don_hang.ngay_dat, don_hang.ten_nguoi_nhan, don_hang.sdt_nguoi_nhan, don_hang.dia_chi_nhan, don_hang.tong_tien, don_hang.ghi_chu, trang_thai.ma_trang_thai, trang_thai.ten_trang_thai, don_vi_van_chuyen.ten_van_chuyen, don_vi_van_chuyen.gia_van_chuyen, hang_hoa.ma_hh, chi_tiet_hang_hoa.ma_cthh, hang_hoa.ten_hh, chi_tiet_hang_hoa.don_gia, chi_tiet_hang_hoa.giam_gia, chi_tiet_hang_hoa.don_vi, hinh_hang_hoa.ma_hinh, hinh_hang_hoa.ten_hinh, chi_tiet_don_hang.so_luong
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
        'ma_trang_thai' => $result[0]['ma_trang_thai'],
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
                'ma_cthh' => $item['ma_cthh'],
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

function donhang_update_da_nhan_hang($ma_dh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "UPDATE don_hang SET ma_trang_thai = '8' WHERE don_hang.ma_dh = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
}

function donhang_insert($data)
{
    extract($data);
    $conn = connection();
    $sql = "INSERT INTO don_hang (ma_kh, ngay_dat, ma_trang_thai, ten_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nhan, tong_tien, ma_van_chuyen, ghi_chu, danh_gia_don_hang) 
    VALUES ('$ma_kh', '$ngay_dat', '1', '$ten_nguoi_nhan', '$sdt_nguoi_nhan', '$dia_chi_nhan', $tong_tien, $ma_van_chuyen, '$ghi_chu', '0')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $conn->lastInsertId();
}

function donhang_chitiet_insert($ma_dh, $data)
{
    $sql = "INSERT INTO chi_tiet_don_hang (ma_dh, ma_cthh, so_luong) VALUES ";
    $conn = connection();
    foreach($data as $item) {
        $sql = $sql. "($ma_dh, '$item[ma_cthh]', '$item[so_luong]'),";
    };
    $newSQl = substr($sql, 0 , -1);
    $stmt = $conn->prepare($newSQl);
    $stmt->execute();
}



function donhang_all($key = '')
{
    $conn = connection();
    if(!empty($key)) {
        $sql = "SELECT don_hang.ma_dh, don_hang.ngay_dat, don_hang.tong_tien, don_hang.ma_kh as 'tk_dat', don_hang.ten_nguoi_nhan, don_hang.sdt_nguoi_nhan, don_hang.dia_chi_nhan, don_hang.danh_gia_don_hang, trang_thai.ma_trang_thai, trang_thai.ten_trang_thai, don_vi_van_chuyen.ten_van_chuyen, chi_tiet_don_hang.so_luong, hang_hoa.ten_hh, chi_tiet_hang_hoa.ma_cthh, chi_tiet_hang_hoa.giam_gia, chi_tiet_hang_hoa.don_gia, chi_tiet_hang_hoa.don_vi, hinh_hang_hoa.ma_hinh, hinh_hang_hoa.ten_hinh
        FROM don_hang 
        JOIN chi_tiet_don_hang ON don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
        JOIN trang_thai ON don_hang.ma_trang_thai = trang_thai.ma_trang_thai 
        JOIN don_vi_van_chuyen ON don_hang.ma_van_chuyen = don_vi_van_chuyen.ma_van_chuyen 
        JOIN chi_tiet_hang_hoa ON chi_tiet_don_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh
        JOIN hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh
        JOIN hinh_hang_hoa ON hang_hoa.ma_hh = hinh_hang_hoa.ma_hh
        WHERE don_hang.ma_dh = $key";
    }
    else {
        $sql = "SELECT don_hang.ma_dh, don_hang.ngay_dat, don_hang.tong_tien, don_hang.ma_kh as 'tk_dat', don_hang.ten_nguoi_nhan, don_hang.sdt_nguoi_nhan, don_hang.dia_chi_nhan, don_hang.danh_gia_don_hang, trang_thai.ma_trang_thai, trang_thai.ten_trang_thai, don_vi_van_chuyen.ten_van_chuyen, chi_tiet_don_hang.so_luong, hang_hoa.ten_hh, chi_tiet_hang_hoa.ma_cthh, chi_tiet_hang_hoa.giam_gia, chi_tiet_hang_hoa.don_gia, chi_tiet_hang_hoa.don_vi, hinh_hang_hoa.ma_hinh, hinh_hang_hoa.ten_hinh
        FROM don_hang 
        JOIN chi_tiet_don_hang ON don_hang.ma_dh = chi_tiet_don_hang.ma_dh 
        JOIN trang_thai ON don_hang.ma_trang_thai = trang_thai.ma_trang_thai 
        JOIN don_vi_van_chuyen ON don_hang.ma_van_chuyen = don_vi_van_chuyen.ma_van_chuyen 
        JOIN chi_tiet_hang_hoa ON chi_tiet_don_hang.ma_cthh = chi_tiet_hang_hoa.ma_cthh
        JOIN hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh
        JOIN hinh_hang_hoa ON hang_hoa.ma_hh = hinh_hang_hoa.ma_hh
        ORDER BY don_hang.ma_dh DESC";
    }

    $stmt = $conn->prepare($sql);
    $stmt->execute();
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
                'tong_tien' => $row['tong_tien'],
                'tong_tien' => $row['tong_tien'],
                'tk_dat' => $row['tk_dat'],
                'ten_nguoi_nhan' => $row['ten_nguoi_nhan'],
                'sdt_nguoi_nhan' => $row['sdt_nguoi_nhan'],
                'tong_tien' => $row['tong_tien'],
                'dia_chi_nhan' => $row['dia_chi_nhan'],
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


function trangthai_all()
{
    $conn = connection();
    $sql = "SELECT * FROM trang_thai";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function donhang_update_trangthai($data)
{
    extract($data);
    $conn = connection();
    $sql = "UPDATE don_hang SET ma_trang_thai = '$ma_trang_thai' WHERE don_hang.ma_dh = $ma_dh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}


function donhang_total($month = '')
{
    $conn = connection();

    if(!empty($month)) {

        $sql = "SELECT COUNT(*) AS tong_donhang FROM don_hang WHERE ma_trang_thai <> 5 AND MONTH(ngay_dat) = $month";
    }
    else {

        $sql = "SELECT COUNT(*) AS tong_donhang FROM don_hang WHERE ma_trang_thai <> 5";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['tong_donhang'];
}

function donhang_total_doanhso($month = '')
{
    $conn = connection();
    if(!empty($month)) {
        $sql = "SELECT SUM(tong_tien) as tong_tien  FROM don_hang WHERE ma_trang_thai <> 5 AND MONTH(ngay_dat) = $month";
    }
    else {
        $sql = "SELECT SUM(tong_tien) as tong_tien  FROM don_hang WHERE ma_trang_thai <> 5";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['tong_tien'];
}

function donhang_total_danhgia($month = '')
{
    if(!empty($month)) {
        $sql = "SELECT COUNT(*) as total_danhgia  FROM danh_gia WHERE MONTH(ngay_danh_gia) = $month";
    }
    else {
        $sql = "SELECT COUNT(*) as total_danhgia  FROM danh_gia";

    }

    $conn = connection();

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_danhgia'];
}

function donhang_comment($month = '')
{
    $conn = connection();
    if(!empty($month)) {
        $sql = "SELECT COUNT(*) AS tong_comment FROM binh_luan WHERE MONTH(ngay_bl) = $month";
    }
    else {
        $sql = "SELECT COUNT(*) AS tong_comment FROM binh_luan";

    }


    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['tong_comment'];
}

function donhang_doanhthu_6thang()
{
    $conn = connection();
    $sql = "SELECT 
    DATE_FORMAT(ngay_dat, '%Y-%m') AS thang, 
    SUM(tong_tien) AS tong_tien_theo_thang
        FROM 
            don_hang
            WHERE ngay_dat >= DATE_FORMAT(NOW() - INTERVAL 5 MONTH, '%Y-%m-01') AND ma_trang_thai <> 5
        GROUP BY 
            DATE_FORMAT(ngay_dat, '%Y-%m');";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>


