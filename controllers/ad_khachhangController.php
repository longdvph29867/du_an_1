<?php

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
function ad_list_kh() {
    $listkhachhang = khachhang_all();
    $view_name = "list.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listkhachhang' => $listkhachhang]);
}

function ad_add_khachhang() {
    $view_name = "add.php";
    view('layout/layout-admin', ['view_name' => $view_name]);
}
function ad_khachhang_delete() {
    $ma_kh= $_GET['ma_kh'];
    khachhang_delete($ma_kh);
    header('location: ?ctl=ad-list-kh');
}
function ad_khachhang_search() {
    $key = $_POST['search'];
    $listkh = khachhang_search($key);
    $view_name = "list.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listkh' => $listkh, 'key' => $key]);
}
function ad_update_khachhang() {
    $ma_kh = $_GET['ma_kh'];
    $data = khachhang_select_by_id($ma_kh);
    $view_name = "update.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'data' => $data]);
}

function ad_insert_khachhang() {
    global $image_dir;
    $errors = validateFileImg('img') + validateInsertLoai($_POST['ho_ten']);
    if(empty($errors)) {
        $hinh = save_file('img', "$image_dir/users/");
        $data = [
            'ho_ten' => $_POST['ho_ten'],
            'hinh' => $hinh,
        ];
        loai_insert($data);
        header('location: ?ctl=ad-list-kh');
    }
    else {
        $listkhachhang = khachhang_all();
        $view_name = "add.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'listkhachhang' => $listkhachhang], $errors, $_POST);
    }
}

function ad_khachhang_update() {
    global $image_dir;
    $errors = validateInsertLoai($_POST['ten_loai']);
    if(!empty($_FILES['img']['name'])) {
        $errors += validateFileImg('img_loai');
    }
    if(empty($errors)) {
        if(!empty($_FILES['img']['name'])) {
            $hinh_loai = save_file('img', "$image_dir/users/");
            $data = [
                'ma_kh' => $_POST['ma_kh'],
                'ho_ten' => $_POST['ho_ten'],
                'hinh' => $hinh,
            ];
                loai_update($data);
                header('location: ?ctl=ad-list-kh');
        }
        else {
            $data = [
                'ma_kh' => $_POST['ma_kh'],
                'ho_ten' => $_POST['ho_ten'],
                'hinh_loai' => $_POST['img_loai_old'],
            ];
                loai_update($data);
                header('location: ?ctl=ad-list-kh');
        }
    }
    else {
        $ma_loai = $_GET['ma_loai'];
        $data = loai_select_by_id($ma_loai);
        $view_name = "update.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'data' => $data], $errors);
    }
}




?>