<?php
// top 10 hàng hoá
function hanghoa_top_10()
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
    INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh ORDER BY hang_hoa.so_luot_xem DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $hangHoaArr = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $maHH = $row['ma_hh'];
        $maHinh = $row['ma_hinh'];
        $maCthh = $row['ma_cthh'];
        if(!isset($hangHoaArr[$maHH])) {
            $hangHoaArr[$maHH] = [
                'ma_hh' => $row['ma_hh'],
                'ten_hh' => $row['ten_hh'],
                'so_luot_xem' => $row['so_luot_xem'],
                'hinhArr' => [],
                'chi_tiet_sp' => []
            ];
        }
        if(!isset($hangHoaArr[$maHH]['hinhArr'][$maHinh])) {
            $hangHoaArr[$maHH]['hinhArr'][$maHinh] = $row['ten_hinh'];
        }
        if(!isset($hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh])) {
            $hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh] = [
                'ma_cthh' => $row['ma_cthh'],
                'don_vi' => $row['don_vi'],
                'don_gia' => $row['don_gia'],
                'giam_gia' => $row['giam_gia'],
                'so_luong' => $row['so_luong'],
            ];
        }
    }
    // echo "<pre>";
    // print_r($hangHoaArr);
    return array_slice($hangHoaArr, 0, 10);
}

// các sản phẩm đặc biệt
function hanghoa_dac_biet()
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
    INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh WHERE hang_hoa.dac_biet = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $hangHoaArr = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $maHH = $row['ma_hh'];
        $maHinh = $row['ma_hinh'];
        $maCthh = $row['ma_cthh'];
        if(!isset($hangHoaArr[$maHH])) {
            $hangHoaArr[$maHH] = [
                'ma_hh' => $row['ma_hh'],
                'ten_hh' => $row['ten_hh'],
                'hinhArr' => [],
                'chi_tiet_sp' => []
            ];
        }
        if(!isset($hangHoaArr[$maHH]['hinhArr'][$maHinh])) {
            $hangHoaArr[$maHH]['hinhArr'][$maHinh] = $row['ten_hinh'];
        }
        if(!isset($hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh])) {
            $hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh] = [
                'don_vi' => $row['don_vi'],
                'don_gia' => $row['don_gia'],
                'giam_gia' => $row['giam_gia'],
                'so_luong' => $row['so_luong'],
            ];
        }
    }
    return $hangHoaArr;
}

function hanghoa_all()
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa 
    INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
    INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
    ORDER BY hang_hoa.ma_hh ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $hangHoaArr = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $maHH = $row['ma_hh'];
        $maHinh = $row['ma_hinh'];
        $maCthh = $row['ma_cthh'];
        if(!isset($hangHoaArr[$maHH])) {
            $hangHoaArr[$maHH] = [
                'ma_hh' => $row['ma_hh'],
                'ten_hh' => $row['ten_hh'],
                'hinhArr' => [],
                'chi_tiet_sp' => []
            ];
        }
        if(!isset($hangHoaArr[$maHH]['hinhArr'][$maHinh])) {
            $hangHoaArr[$maHH]['hinhArr'][$maHinh] = $row['ten_hinh'];
        }
        if(!isset($hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh])) {
            $hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh] = [
                'don_vi' => $row['don_vi'],
                'don_gia' => $row['don_gia'],
                'giam_gia' => $row['giam_gia'],
                'so_luong' => $row['so_luong'],
            ];
        }
    }
    // echo "<pre>";
    // print_r($hangHoaArr);
    return $hangHoaArr;
}

function hanghoa_by_ma_loai($ma_loai)
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa 
    INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
    INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
    WHERE hang_hoa.ma_loai = $ma_loai
    ORDER BY hang_hoa.ma_hh ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $hangHoaArr = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $maHH = $row['ma_hh'];
        $maHinh = $row['ma_hinh'];
        $maCthh = $row['ma_cthh'];
        if(!isset($hangHoaArr[$maHH])) {
            $hangHoaArr[$maHH] = [
                'ma_hh' => $row['ma_hh'],
                'ten_hh' => $row['ten_hh'],
                'hinhArr' => [],
                'chi_tiet_sp' => []
            ];
        }
        if(!isset($hangHoaArr[$maHH]['hinhArr'][$maHinh])) {
            $hangHoaArr[$maHH]['hinhArr'][$maHinh] = $row['ten_hinh'];
        }
        if(!isset($hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh])) {
            $hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh] = [
                'don_vi' => $row['don_vi'],
                'don_gia' => $row['don_gia'],
                'giam_gia' => $row['giam_gia'],
                'so_luong' => $row['so_luong'],
            ];
        }
    }
    // echo "<pre>";
    // print_r($hangHoaArr);
    return $hangHoaArr;
}

?>