
<?php
function hanghoa_ct($ma_hh)
{
  
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa where ma_hh = $ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function hanghoa_tang_so_luot_xem($ma_hh)
{
  
    $conn = connection();
    $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE hang_hoa.ma_hh = $ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function hanghoa_cl($ma_hh){
    $data[] = $ma_hh;
    $conn = connection();
    $sql="select * from hang_hoa where  ma_hh =".$ma_hh;
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    $hanghoa = $stmt->fetchAll();
    return $hanghoa;
}

function hanghoa_by_ma_hanghoa($ma_hh)
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa 
    INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
    INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
    INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai 
    WHERE hang_hoa.ma_hh = $ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $hangHoaChiTiet = [

        'ma_hh' => $result[0]['ma_hh'],
        'ten_hh' => $result[0]['ten_hh'],
        'mo_ta' => $result[0]['mo_ta'],
        'dac_biet' => $result[0]['dac_biet'],
        'so_luot_xem' => $result[0]['so_luot_xem'],
        'ma_loai' => $result[0]['ma_loai'],
        'ten_loai' => $result[0]['ten_loai'],
        'ngay_nhap' => $result[0]['ngay_nhap'],
        'hinhArr' => [],
        'chi_tiet_sp' => [],
    ];
    foreach ($result as $row) {
        $maHinh = $row['ma_hinh'];
        $maCthh = $row['ma_cthh'];
        if(!isset($hangHoaChiTiet['hinhArr'][$maHinh])) {
            $hangHoaChiTiet['hinhArr'][$maHinh] = $row['ten_hinh'];
        }
        if(!isset($hangHoaChiTiet['chi_tiet_sp'][$maCthh])) {
            $hangHoaChiTiet['chi_tiet_sp'][$maCthh] = [
                'ma_cthh' => $row['ma_cthh'],
                'don_vi' => $row['don_vi'],
                'don_gia' => $row['don_gia'],
                'giam_gia' => $row['giam_gia'],
                'so_luong' => $row['so_luong'],
            ];
        }
    }
   
    return $hangHoaChiTiet;
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
    return $hangHoaArr;
}


function hanghoa_all($data = [])
{
    $conn = connection();
    if(isset($data['ma_loai'])) {
        $sql = "SELECT * FROM hang_hoa 
        INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
        INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
        WHERE hang_hoa.ma_loai = $data[ma_loai]
        GROUP BY hang_hoa.ma_hh
        ORDER BY hang_hoa.ma_hh ASC";
    }
    else {
        $sql = "SELECT * FROM hang_hoa 
        INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
        INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
        GROUP BY hang_hoa.ma_hh
        ORDER BY hang_hoa.ma_hh ASC";

    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $hangHoaArr = [];
    
    
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     $maHH = $row['ma_hh'];
    //     $maHinh = $row['ma_hinh'];
    //     $maCthh = $row['ma_cthh'];
    //     if(!isset($hangHoaArr[$maHH])) {
    //         $hangHoaArr[$maHH] = [
    //             'ma_hh' => $row['ma_hh'],
    //             'ten_hh' => $row['ten_hh'],
    //             'so_luot_xem' => $row['so_luot_xem'],
    //             'mo_ta' => $row['mo_ta'],
    //             'hinhArr' => [],
    //             'chi_tiet_sp' => []
    //         ];
    //     }
    //     if(!isset($hangHoaArr[$maHH]['hinhArr'][$maHinh])) {
    //         $hangHoaArr[$maHH]['hinhArr'][$maHinh] = $row['ten_hinh'];
    //     }
    //     if(!isset($hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh])) {
    //         $hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh] = [
    //             'ma_cthh' => $row['ma_cthh'],
    //             'don_vi' => $row['don_vi'],
    //             'don_gia' => $row['don_gia'],
    //             'giam_gia' => $row['giam_gia'],
    //             'so_luong' => $row['so_luong'],
    //         ];
    //     }
    // }
    // echo "<pre>";
    // print_r($hangHoaArr);
    return $result;
}
function hanghoa_all_ad()
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
                'so_luot_xem' => $row['so_luot_xem'],
                'mo_ta' => $row['mo_ta'],
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
    return $hangHoaArr;
}

function hanghoa_insert($data)
{
    extract($data);
    
    $conn = connection();
    $sql = "INSERT INTO hang_hoa (ten_hh, ngay_nhap, mo_ta, dac_biet, so_luot_xem, ma_loai) 
    VALUES ('$ten_hh', '$ngay_nhap', '$mo_ta', '$dac_biet', '0', '$ma_loai')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $new_ma_hh = $conn->lastInsertId();

    $sqlHinhHH = "INSERT INTO hinh_hang_hoa (ma_hh, ten_hinh) VALUES ";
    foreach($hinhArr as $item) {
        $sqlHinhHH = $sqlHinhHH. "($new_ma_hh, '$item'),";
    };
    $new_SQLHinhHH = substr($sqlHinhHH, 0 , -1);
    $stmt = $conn->prepare($new_SQLHinhHH);
    $stmt->execute();

    $sqlThuocTinh = "INSERT INTO chi_tiet_hang_hoa (ma_hh, don_vi, don_gia, giam_gia, so_luong) VALUES ";
    foreach($thuoc_tinh as $item) {
        $sqlThuocTinh = $sqlThuocTinh. "($new_ma_hh, '$item[don_vi]', $item[don_gia], $item[giam_gia], $item[so_luong]),";
    };
    $new_SQLThuocTinh = substr($sqlThuocTinh, 0 , -1);
    $stmt = $conn->prepare($new_SQLThuocTinh);
    $stmt->execute();
    // echo "<pre>";
    // print_r($hangHoaArr);
    // echo "</pre>";

}

function hanghoa_insert_hinh($data)
{
    extract($data);
    $conn = connection();
    $sql = "INSERT INTO hinh_hang_hoa (ma_hh, ten_hinh) VALUES ('$ma_hh', '$ten_hinh')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function hanghoa_delete_hinh($ma_hinh)
{
    $conn = connection();
    $sql = "DELETE FROM hinh_hang_hoa WHERE hinh_hang_hoa.ma_hinh = $ma_hinh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function hanghoa_insert_thuoctinh($data)
{
    extract($data);
    $conn = connection();
    $sql = "INSERT INTO chi_tiet_hang_hoa (ma_hh, don_vi, don_gia, giam_gia, so_luong) VALUES ('$ma_hh', '$don_vi', '$don_gia', '$giam_gia', '$so_luong')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function hanghoa_thuoctinh_by_macthh($ma_cthh)
{
    $conn = connection();
    $sql = "SELECT * FROM `chi_tiet_hang_hoa` WHERE ma_cthh = $ma_cthh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function hanghoa_update_thuoctinh($data)
{
    extract($data);
    $conn = connection();
    $sql = "UPDATE `chi_tiet_hang_hoa` SET `don_vi` = '$don_vi', `don_gia` = '$don_gia', `giam_gia` = '$giam_gia', `so_luong` = '$so_luong' WHERE `chi_tiet_hang_hoa`.`ma_cthh` = $ma_cthh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function hanghoa_delete_thuoctinh($ma_cthh)
{
    $conn = connection();
    $sql = "DELETE FROM chi_tiet_hang_hoa WHERE `chi_tiet_hang_hoa`.`ma_cthh` = $ma_cthh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function hanghoa_update_thongin($data)
{
    extract($data);
    $conn = connection();
    $sql = "UPDATE hang_hoa SET ten_hh = '$ten_hh', mo_ta = '$mo_ta', dac_biet = '$dac_biet', ma_loai = '$ma_loai' WHERE hang_hoa.ma_hh = $ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function hanghoa_delete_hh($ma_hh)
{
    $conn = connection();
    $sql = "DELETE FROM hang_hoa WHERE `hang_hoa`.`ma_hh` = $ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

// Tìm kiếm hàng hoá 
// function hanghoa_search($key)
// {
//     $conn = connection();
//     $sql = "SELECT * FROM hang_hoa INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh WHERE hang_hoa.ten_hh LIKE '%$key%'";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     $hangHoaArr = [];
//     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         $maHH = $row['ma_hh'];
//         $maHinh = $row['ma_hinh'];
//         if(!isset($hangHoaArr[$maHH])) {
//             $hangHoaArr[$maHH] = [
//                 'ma_hh' => $row['ma_hh'],
//                 'ten_hh' => $row['ten_hh'],
//                 'so_luot_xem' => $row['so_luot_xem'],
//                 'mo_ta' => $row['mo_ta'],
//                 'hinhArr' => [],
//             ];
//         }
//         if(!isset($hangHoaArr[$maHH]['hinhArr'][$maHinh])) {
//             $hangHoaArr[$maHH]['hinhArr'][$maHinh] = $row['ten_hinh'];
//         }
//     }
//     // echo "<pre>";
//     // print_r($hangHoaArr);
//     // echo "</pre>";

//     return $hangHoaArr;
// }

function hanghoa_search($keyword, $type = '')
{
    switch ($type) {
        case 'hot':
            $sql = "SELECT * FROM hang_hoa 
            INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN loai ON loai.ma_loai = hang_hoa.ma_loai
            WHERE hang_hoa.ten_hh LIKE '%$keyword%' OR loai.ten_loai LIKE '%$keyword%'
            GROUP BY hang_hoa.ma_hh
            ORDER BY hang_hoa.so_luot_xem DESC";
            break;
        case 'rating':
            $sql = "SELECT *, COALESCE(AVG(danh_gia.xep_hang), 0) AS rating FROM hang_hoa 
            INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN loai ON loai.ma_loai = hang_hoa.ma_loai
            LEFT JOIN danh_gia ON danh_gia.ma_hh = hang_hoa.ma_hh
            GROUP BY hang_hoa.ma_hh
            ORDER BY rating DESC";
            break;
        case 'new':
            $sql = "SELECT * FROM hang_hoa 
            INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN loai ON loai.ma_loai = hang_hoa.ma_loai
            WHERE hang_hoa.ten_hh LIKE '%$keyword%' OR loai.ten_loai LIKE '%$keyword%'
            GROUP BY hang_hoa.ma_hh
            ORDER BY hang_hoa.ma_hh DESC";
            break;
        case 'low-to-high':
            $sql = "SELECT * FROM hang_hoa 
            INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN loai ON loai.ma_loai = hang_hoa.ma_loai
            WHERE hang_hoa.ten_hh LIKE '%$keyword%' OR loai.ten_loai LIKE '%$keyword%'
            GROUP BY hang_hoa.ma_hh
            ORDER BY chi_tiet_hang_hoa.don_gia ASC";
            break;
        case 'high-to-low':
            $sql = "SELECT * FROM hang_hoa 
            INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN loai ON loai.ma_loai = hang_hoa.ma_loai
            WHERE hang_hoa.ten_hh LIKE '%$keyword%' OR loai.ten_loai LIKE '%$keyword%'
            GROUP BY hang_hoa.ma_hh
            ORDER BY chi_tiet_hang_hoa.don_gia DESC";
            break;
        default:
            $sql = "SELECT * FROM hang_hoa 
            INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN loai ON loai.ma_loai = hang_hoa.ma_loai
            WHERE hang_hoa.ten_hh LIKE '%$keyword%' OR loai.ten_loai LIKE '%$keyword%'
            GROUP BY hang_hoa.ma_hh
            ORDER BY hang_hoa.ma_hh ASC";
            break;
    }
    $conn = connection();
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $hangHoaArr = [];
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     $maHH = $row['ma_hh'];
    //     $maHinh = $row['ma_hinh'];
    //     $maCthh = $row['ma_cthh'];
    //     if(!isset($hangHoaArr[$maHH])) {
    //         $hangHoaArr[$maHH] = [
    //             'ma_hh' => $row['ma_hh'],
    //             'ten_hh' => $row['ten_hh'],
    //             'so_luot_xem' => $row['so_luot_xem'],
    //             'hinhArr' => [],
    //             'chi_tiet_sp' => []
    //         ];
    //     }
    //     if(!isset($hangHoaArr[$maHH]['hinhArr'][$maHinh])) {
    //         $hangHoaArr[$maHH]['hinhArr'][$maHinh] = $row['ten_hinh'];
    //     }
    //     if(!isset($hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh])) {
    //         $hangHoaArr[$maHH]['chi_tiet_sp'][$maCthh] = [
    //             'ma_cthh' => $row['ma_cthh'],
    //             'don_vi' => $row['don_vi'],
    //             'don_gia' => $row['don_gia'],
    //             'giam_gia' => $row['giam_gia'],
    //             'so_luong' => $row['so_luong'],
    //         ];
    //     }
    // }
    // echo "<pre>";
    // print_r($hangHoaArr);
    return $result;
}

function hanghoa_search_ad($keyword)
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa 
    INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
    INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
    INNER JOIN loai ON loai.ma_loai = hang_hoa.ma_loai
    WHERE hang_hoa.ten_hh LIKE '%$keyword%' OR loai.ten_loai LIKE '%$keyword%'
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
    return $hangHoaArr;
}

// ddddd
function hanghoa_update_so_luong($data, $dauCongTru)
{
    $conn = connection();
    foreach ($data as $item) {
        $ma_cthh = $item['ma_cthh'];
        $so_luong = $item['so_luong'];

        if(!$dauCongTru) {
            $so_luong = $so_luong * (-1);
        }
        $sql = "UPDATE chi_tiet_hang_hoa SET so_luong = so_luong + $so_luong WHERE chi_tiet_hang_hoa.ma_cthh = $ma_cthh";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}

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
                'ma_cthh' => $row['ma_cthh'],
                'don_vi' => $row['don_vi'],
                'don_gia' => $row['don_gia'],
                'giam_gia' => $row['giam_gia'],
                'so_luong' => $row['so_luong'],
            ];
        }
    }
    return $hangHoaArr;
}


function hanghoa_filter($type)
{
    switch ($type) {
        case 'hot':
            $sql = "SELECT * FROM hang_hoa 
            INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
            ORDER BY hang_hoa.so_luot_xem DESC";
            break;
        case 'new':
            $sql = "SELECT * FROM hang_hoa 
            INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
            ORDER BY hang_hoa.ma_hh ASC";
            break;
        default:
            $sql = "SELECT * FROM hang_hoa 
            INNER JOIN hinh_hang_hoa ON hinh_hang_hoa.ma_hh = hang_hoa.ma_hh 
            INNER JOIN chi_tiet_hang_hoa ON chi_tiet_hang_hoa.ma_hh = hang_hoa.ma_hh 
            ORDER BY hang_hoa.ma_hh ASC";
            break;
    }


    $conn = connection();
    
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
                'mo_ta' => $row['mo_ta'],
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
    return $hangHoaArr;
}

?>