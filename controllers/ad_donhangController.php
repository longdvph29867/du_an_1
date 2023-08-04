<?php

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
function ad_donhang_list() {
    $listDonHang = donhang_all('');

    $view_name = "list.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listDonHang' => $listDonHang]);
}

function ad_form_trangthai() {
    $ma_dh = $_GET['ma_dh'];
    $data = donhang_by_id($ma_dh);

    $listTrangThai = trangthai_all();
    $view_name = "update.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'data' => $data, 'listTrangThai' => $listTrangThai]);
}


function ad_update_trangthai() {
    $data = $_POST;
    donhang_update_trangthai($data);
    
    addMesssage(true, "Cập nhật trạng thái thành công");
    header("location: ?ctl=ad-update&ma_dh=$data[ma_dh]");
}

function ad_loai_search() {
    $key = $_GET['search'];
    if(empty($key)) {
        header('location: ?ctl=ad-list');
    }
    else {
        $listDonHang = donhang_all($key);
        $view_name = "list.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'listDonHang' => $listDonHang, 'key' => $key]);
    }
}
?>