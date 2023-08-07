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
    addMesssage(true, "Xoá thành công");
    header('location: ?ctl=ad-list');
}
function ad_khachhang_search() {
    $key = $_GET['search'];
    if(empty($key)) {
        header('location: ?ctl=ad-list');
    }
    else {
        $listkhachhang = khachhang_search($key);
        $view_name = "list.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'listkhachhang' => $listkhachhang, 'key' => $key]);
    }
}
function ad_sua_khachhang() {
    $ma_kh = $_GET['ma_kh'];
    $data = khachhang_select_by_id($ma_kh);
    $view_name = "update.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'data' => $data]);
}

function ad_insert_khachhang() {
    global $image_dir;
    $errors = validateInsertKH_ad($_POST) + validateFileImg('file');
    
    if(empty($errors)) {
        $user = khachhang_select_by_id($_POST['ma_kh']);
        if(!$user) {
            $hinh = save_file('file', "$image_dir/users/");
            $data = [
                'ma_kh' => $_POST['ma_kh'],
                'ho_ten' => $_POST['ho_ten'],
                'mat_khau' => $_POST['mat_khau'],
                'sdt' => $_POST['sdt'],
                'email' => $_POST['email'],
                'vai_tro' => $_POST['vai_tro'],
                'hinh' => $hinh,
            ];
            khachhang_insert_ad($data);
            addMesssage(true, "Thêm thành công");
            header('location: ?ctl=ad-list');
        }
        else {
            $listkhachhang = [];
            $view_name = "add.php";
            view('layout/layout-admin', ['view_name' => $view_name, 'listkhachhang' => $listkhachhang], $errors, $_POST);
            echoMesssage(false, "Tài khản đã tồn tại!");
        }
    }
    else {
        $listkhachhang = [];
        $view_name = "add.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'listkhachhang' => $listkhachhang], $errors, $_POST);
    }
}

function ad_khachhang_update() {
    global $image_dir;
    $ma_kh = $_GET['ma_kh'];
    $dataInfo = khachhang_select_by_id($ma_kh);

    // echo '<pre>';
    // print_r($dataInfo);
    // echo '</pre>';

    $errors = validateUpdateKH_ad($_POST, $dataInfo['mat_khau']);


    if(!empty($_FILES['file']['name'])) {
        $errors += validateFileImg('file');
    }
    if(empty($errors)) {
        if(!empty($_FILES['file']['name'])) {
            $hinh = save_file('file', "$image_dir/users/");
            $data = [
                'ma_kh' => $ma_kh,
                'ho_ten' => $_POST['ho_ten'],
                'mat_khau' => $_POST['mat_khau'],
                'sdt' => $_POST['sdt'],
                'email' => $_POST['email'],
                'vai_tro' => $_POST['vai_tro'],
                'hinh' => $hinh,
            ];
        }
        else {
            $data = [
                'ma_kh' => $ma_kh,
                'ho_ten' => $_POST['ho_ten'],
                'mat_khau' => $_POST['mat_khau'],
                'sdt' => $_POST['sdt'],
                'email' => $_POST['email'],
                'vai_tro' => $_POST['vai_tro'],
                'hinh' => $_POST['img_old'],
            ];
        }

        khachhang_update_ad($data);
        addMesssage(true, "Cập nhật thành công");
        header('location: ?ctl=ad-list');
    }
    else {
        $view_name = "update.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'data' => $dataInfo], $errors);

    }


    // if(!empty($_FILES['img']['name'])) {
    //     $errors += validateFileImg('img_loai');
    // }
    // if(empty($errors)) {
        
    // }
    // else {
    //     $ma_loai = $_GET['ma_loai'];
    //     $data = loai_select_by_id($ma_loai);
    //     $view_name = "update.php";
    //     view('layout/layout-admin', ['view_name' => $view_name, 'data' => $data], $errors);
    // }
}




?>