<?php

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
function ad_donhang_list() {
    $listDonHang = donhang_all();

    $view_name = "list.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listDonHang' => $listDonHang]);
}

function ad_update_trangthai() {
    $ma_dh = $_GET['ma_dh'];
    $data = donhang_by_id($ma_dh);
    
    $view_name = "update.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'data' => $data]);
}


function ad_add_loai() {
    $view_name = "add.php";
    view('layout/layout-admin', ['view_name' => $view_name]);
}

function ad_update_loai() {
    $ma_loai = $_GET['ma_loai'];
    $data = loai_select_by_id($ma_loai);
    $view_name = "update.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'data' => $data]);
}

function ad_insert_loai() {
    global $image_dir;
    $errors = validateFileImg('img_loai') + validateInsertLoai($_POST['ten_loai']);
    if(empty($errors)) {
        $hinh_loai = save_file('img_loai', "$image_dir/category/");
        $data = [
            'ten_loai' => $_POST['ten_loai'],
            'hinh_loai' => $hinh_loai,
        ];
        loai_insert($data);
        addMesssage(true, "Thêm thành công");
        header('location: ?ctl=ad-list');
    }
    else {
        $listLoai = loai_all();
        $view_name = "add.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'listLoai' => $listLoai], $errors, $_POST);
    }
}

function ad_loai_update() {
    global $image_dir;
    $errors = validateInsertLoai($_POST['ten_loai']);
    if(!empty($_FILES['img_loai']['name'])) {
        $errors += validateFileImg('img_loai');
    }
    if(empty($errors)) {
        if(!empty($_FILES['img_loai']['name'])) {
            $hinh_loai = save_file('img_loai', "$image_dir/category/");
            $data = [
                'ma_loai' => $_POST['ma_loai'],
                'ten_loai' => $_POST['ten_loai'],
                'hinh_loai' => $hinh_loai,
            ];
                loai_update($data);
                addMesssage(true, "Cập nhật thành công");
                header('location: ?ctl=ad-list');
        }
        else {
            $data = [
                'ma_loai' => $_POST['ma_loai'],
                'ten_loai' => $_POST['ten_loai'],
                'hinh_loai' => $_POST['img_loai_old'],
            ];
                loai_update($data);
                addMesssage(true, "Cập nhật thành công");
                header('location: ?ctl=ad-list');
        }
    }
    else {
        $ma_loai = $_GET['ma_loai'];
        $data = loai_select_by_id($ma_loai);
        $view_name = "update.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'data' => $data], $errors);
    }
}

function ad_loai_delete() {
    $ma_loai = $_GET['ma_loai'];
    loai_delete($ma_loai);
    addMesssage(true, "Xoá thành công");
    header('location: ?ctl=ad-list');
}

function ad_loai_search() {
    $key = $_GET['search'];
    if(empty($key)) {
        header('location: ?ctl=ad-list');
    }
    else {
        $listLoai = loai_search($key);
        $view_name = "list.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'listLoai' => $listLoai, 'key' => $key]);
    }
}
?>