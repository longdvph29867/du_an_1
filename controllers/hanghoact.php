<?php
function hanghoact()
{
    // $hanghoacl = hanghoa_cl();
    $ma_hh = $_GET['ma_hh'];
    hanghoa_tang_so_luot_xem($ma_hh);
    $hanghoact =  hanghoa_by_ma_hanghoa($ma_hh);
    $binhluan = binhluan_by_mahh($ma_hh);
    $danhgia = danhgia_by_mahh($ma_hh);
    $sanphamcl = hanghoa_by_ma_loai($hanghoact['ma_loai']);

    $view_name = "chitietsp.php";
    view(
        'layout/layout',
        [
            'view_name' => $view_name,
            'binhluan' => $binhluan,
            'danhgia' => $danhgia,
            'hanghoact' => $hanghoact,
            'sanphamcl' =>  $sanphamcl
        ]
    );
}

function hanghoact_add_cart()
{
    $ma_hh = $_GET['ma_hh'];
    $errors = validateAddCart($_POST);
    // echo "<pre>";
    // print_r($errors);
    if (empty($errors)) {
        giohang_insert($_POST);

        header("location: ?ma_hh=$ma_hh");
    } else {
        $hanghoact =  hanghoa_by_ma_hanghoa($ma_hh);
        $binhluan = binhluan_by_mahh($ma_hh);
        $danhgia = danhgia_by_mahh($ma_hh);
        $sanphamcl = hanghoa_by_ma_loai($hanghoact['ma_loai']);

        $view_name = "chitietsp.php";
        view(
            'layout/layout',
            [
                'view_name' => $view_name,
                'binhluan' => $binhluan,
                'danhgia' => $danhgia,
                'hanghoact' => $hanghoact,
                'sanphamcl' =>  $sanphamcl
            ],
            $errors
        );
    }
}

function hanghoact_add_comment()
{
    global $TODAY;
    $ma_hh = $_GET['ma_hh'];
    $errors = validateAddComment($_POST);
    // echo "<pre>";
    // print_r($errors);
    if (empty($errors)) {
        $data = [
            'noi_dung' => $_POST['noi_dung'],
            'ma_hh' => $ma_hh,
            'ma_kh' => $_SESSION['user']['ma_kh'],
            'ngay_bl' => $TODAY,
        ];
        binhluan_insert($data);
        header("location: ?ma_hh=$ma_hh");
    } else {
        $hanghoact =  hanghoa_by_ma_hanghoa($ma_hh);
        $binhluan = binhluan_by_mahh($ma_hh);
        $danhgia = danhgia_by_mahh($ma_hh);
        $sanphamcl = hanghoa_by_ma_loai($hanghoact['ma_loai']);

        $view_name = "chitietsp.php";
        view(
            'layout/layout',
            [
                'view_name' => $view_name,
                'binhluan' => $binhluan,
                'danhgia' => $danhgia,
                'hanghoact' => $hanghoact,
                'sanphamcl' =>  $sanphamcl
            ],
            $errors
        );
    }
}
function abc()
{
    $view_name = "views/layout/nhap.php";
    view('layout/layout', ['view_name' => $view_name]);
}
