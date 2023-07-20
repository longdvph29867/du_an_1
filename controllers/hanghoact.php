<?php
function hanghoact() {
    // $hanghoacl = hanghoa_cl();
    $ma_hh=$_GET['ma_hh'];
    hanghoa_tang_so_luot_xem($ma_hh);
    $hanghoact =  hanghoa_by_ma_hanghoa($ma_hh);
    $binhluan = binhluan_by_mahh($ma_hh);
    $danhgia = danhgia_by_mahh($ma_hh);
    $sanphamcl= hanghoa_by_ma_loai($hanghoact['ma_loai']);

    $view_name = "chitietsp.php";
    view('layout/layout', ['view_name' => $view_name,'binhluan' => $binhluan,'danhgia' => $danhgia, 'hanghoact' => $hanghoact,'sanphamcl' =>  $sanphamcl]);
}
function abc() {
    $view_name = "views/layout/nhap.php";
    view('layout/layout', ['view_name' => $view_name]);
}

?>