<?php

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
function ad_hanghoa_list() {
    $listSanPhamAll = hanghoa_all();
    $thisPage= $_GET['page'] ?? 1;
    $arrListByPage = array_chunk(array_reverse($listSanPhamAll), 10);
    $pageTotal = ceil(count($arrListByPage));
    $listSanPham = $arrListByPage[$thisPage-1];
    $view_name = "list.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listSanPham' => $listSanPham, 'pageTotal' => $pageTotal]);
}

function ad_add_hanghoa() {
    $listLoai = loai_all();
    $view_name = "add.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listLoai' => $listLoai]);
}

function ad_hanghoa_add_hinh() {
    global $image_dir;
    $ma_hh = $_GET['ma_hh'];
    
    $errors = validateFileImg('file');
    if(empty($errors)) {
        $ten_hinh = save_file('file', "$image_dir/products/");
        $data = [
            'ma_hh' => $ma_hh,
            'ten_hinh' => $ten_hinh,
        ];

        hanghoa_insert_hinh($data);
        addMesssage(true, "Thêm thành công");
        header("location: ?ctl=ad-detail-hh&ma_hh=$ma_hh");
    }
    else {
        $hh_detail = hanghoa_by_ma_hanghoa($ma_hh);
        $view_name = "detail.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'hh_detail' => $hh_detail], $errors);
    }

    // $view_name = "update.php";
    // view('layout/layout-admin', ['view_name' => $view_name, 'data' => $data]);
};

function ad_insert_hanghoa() {
    global $image_dir;
    global $TODAY;
    $errors = validateInsertHH($_POST) + validateFiles('files');

    if(empty($errors)) {
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
        addMesssage(true, "Thêm thành công");
        header('location: ?ctl=ad-list');
    }
    else {
        $listLoai = loai_all();
        $view_name = "add.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'listLoai' => $listLoai], $errors, $_POST);
    }
};

function ad_chitet_hh() {
    $ma_hh = $_GET['ma_hh'];
    $hh_detail = hanghoa_by_ma_hanghoa($ma_hh);
    $view_name = "detail.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'hh_detail' => $hh_detail]);
}


function ad_delete_hinh() {
    $ma_hinh = $_GET['ma_hinh'];
    $ma_hh = $_GET['ma_hh'];
    hanghoa_delete_hinh($ma_hinh);
    header("location: ?ctl=ad-detail-hh&ma_hh=$ma_hh");
};

function ad_add_thuoctinh() {
    $view_name = "addThuocTinh.php";
    view('layout/layout-admin', ['view_name' => $view_name]);
}

function ad_insert_thuoctinh() {
    $ma_hh = $_GET['ma_hh'];
    $errors = validateInsertThuocTinh($_POST);
    if(empty($errors)) {
        $data = [
            'ma_hh' => $ma_hh,
            'don_vi' => $_POST['don_vi'],
            'don_gia' => $_POST['don_gia'],
            'giam_gia' => $_POST['giam_gia'],
            'so_luong' => $_POST['so_luong'],
        ];
        hanghoa_insert_thuoctinh($data);
        addMesssage(true, "Thêm thành công");
        header("location: ?ctl=ad-detail-hh&ma_hh=$ma_hh");
    }
    else {
        $view_name = "addThuocTinh.php";
        view('layout/layout-admin', ['view_name' => $view_name], $errors, $_POST);
    }
}

function ad_sua_thuoctinh() {
    $ma_cthh = $_GET['ma_cthh'];
    $dataThuocTinh = hanghoa_thuoctinh_by_macthh($ma_cthh);

    $view_name = "updateThuocTinh.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'dataThuocTinh' => $dataThuocTinh]);
}

function ad_update_thuoctinh() {
    $errors = validateInsertThuocTinh($_POST);
    if(empty($errors)) {
        hanghoa_update_thuoctinh($_POST);
        addMesssage(true, "Cập nhật thành công");
        header("location: ?ctl=ad-detail-hh&ma_hh=$_POST[ma_hh]");
    }
    else {
        $dataThuocTinh = hanghoa_thuoctinh_by_macthh($_POST['ma_cthh']);
        $view_name = "updateThuocTinh.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'dataThuocTinh' => $dataThuocTinh], $errors);
    }
    
}

function ad_delete_thuoctinh() {
    $ma_hh = $_GET['ma_hh'];
    $ma_cthh = $_GET['ma_cthh'];
    hanghoa_delete_thuoctinh($ma_cthh);
    addMesssage(true, "Xoá thành công");
    header("location: ?ctl=ad-detail-hh&ma_hh=$ma_hh");
    
}

function ad_sua_thongtin() {
    $ma_hh = $_GET['ma_hh'];
    $data = hanghoa_ct($ma_hh);
    $listLoai = loai_all();

    $view_name = "updateThongTin.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listLoai' => $listLoai, 'data' => $data]);
}

function ad_update_thongtin() {
    $ma_hh = $_GET['ma_hh'];
    $errors = validateUpdateThongTin($_POST);
    if(empty($errors)) {
        $data = $_POST;
        hanghoa_update_thongin($data);
        addMesssage(true, "Cập nhật thành công");
        header("location: ?ctl=ad-detail-hh&ma_hh=$data[ma_hh]");
    }
    else {
        $listLoai = loai_all();
        $data = hanghoa_ct($ma_hh);
        $view_name = "updateThongTin.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'listLoai' => $listLoai, 'data' => $data], $errors);
    }
}

function ad_delete_hh() {
    $ma_hh = $_GET['ma_hh'];
    hanghoa_delete_hh($ma_hh);
    addMesssage(true, "Xoá thành công");
    header("location: ?ctl=ad-list");
}

function ad_hanghoa_search() {
    $key = $_GET['search'];
    if(empty($key)) {
        header('location: ?ctl=ad-list');
    }
    else {
        $listSanPham = hanghoa_search($key);
        $view_name = "list.php";
        view('layout/layout-admin', ['view_name' => $view_name, 'listSanPham' => $listSanPham, 'key' => $key]);
    }
}

?>