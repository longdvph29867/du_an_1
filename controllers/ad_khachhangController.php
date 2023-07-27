<?php

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
function ad_hanghoa_list() {
    $listSanPham = hanghoa_all();
    $view_name = "list.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listSanPham' => $listSanPham]);
}

function ad_add_hanghoa() {
    $listLoai = loai_all();
    $view_name = "add.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listLoai' => $listLoai]);
}

function ad_update_loai() {
    $ma_loai = $_GET['ma_loai'];
    $data = loai_select_by_id($ma_loai);
    $view_name = "update.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'data' => $data]);
}

function ad_insert_hanghoa() {
    global $image_dir;
    global $TODAY;
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';

    $arrFileHinh = save_files('files', "$image_dir/products/");
    // $arrFileHinh = '';
    
    $arrtDonVi = [];
    for ($i = 0; $i < count($_POST["don_vi"]); $i++) {
        $arrtDonVi[] = [
            'don_vi' => $_POST["don_vi"][$i],
            'don_gia' => $_POST["don_gia"][$i],
            'giam_gia' => $_POST["giam_gia"][$i],
            'so_luong' => $_POST["so_luong"][$i]
        ];
    };
    $data = [
        'ten_hh' => $_POST['ten_hh'],
        'ngay_nhap' => $TODAY,
        'mo_ta' => $_POST['mo_ta'],
        'dac_biet' => $_POST['dac_biet'],
        'ma_loai' => $_POST['ma_loai'],
        'hinhArr' => $arrFileHinh,
        'thuoc_tinh' => $arrtDonVi,
    ];
    hanghoa_insert($data);
    header('location: ?ctl=ad-list');
    
    // $errors = validateFileImg('img_loai') + validateInsertLoai($_POST['ten_loai']);
    // if(empty($errors)) {
    //     $hinh_loai = save_file('img_loai', "$image_dir/category/");
    //     $data = [
    //         'ten_loai' => $_POST['ten_loai'],
    //         'hinh_loai' => $hinh_loai,
    //     ];
    //     loai_insert($data);
    //     header('location: ?ctl=ad-list');
    // }
    // else {
    //     $listLoai = loai_all();
    //     $view_name = "add.php";
    //     view('layout/layout-admin', ['view_name' => $view_name, 'listLoai' => $listLoai], $errors, $_POST);
    // }
};

function ad_chitet_hh() {
    $view_name = "detail.php";
    view('layout/layout-admin', ['view_name' => $view_name]);
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
                header('location: ?ctl=ad-list');
        }
        else {
            $data = [
                'ma_loai' => $_POST['ma_loai'],
                'ten_loai' => $_POST['ten_loai'],
                'hinh_loai' => $_POST['img_loai_old'],
            ];
                loai_update($data);
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
    header('location: ?ctl=ad-list');
}

function ad_loai_search() {
    $key = $_POST['search'];
    $listLoai = loai_search($key);
    $view_name = "list.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listLoai' => $listLoai, 'key' => $key]);
}
?>