<?php

// hien thi danh sach loai hang
function list_loai() {
    $loaihang = loai_all();
    $message = $_COOKIE['message'] ?? '';
    view('danhmuc/list', ['loaihang' => $loaihang, 'message' => $message]);
}

// add
function add_loai() {
    view('danhmuc/add');
}

// them du lieu vao database
function store_loai() {
    $ten_loai = $_POST['ten_loai'];
    loai_insert($ten_loai);
    setcookie('message', 'Thêm dữ liệu thành công', time() + 1);
    header("location: ?ctl=loai-hang");
    die;
}

// lấy show thông tin 1 lại hàng
function show_loai() {
    $ma_loai = $_GET['id'];
    $loai = loai_select_by_id($ma_loai);
    view('danhmuc/edit', ['loai' => $loai]);
}

// them du lieu vao database
function update_loai() {
    $ma_loai = $_POST['ma_loai'];
    $ten_loai = $_POST['ten_loai'];
    loai_update($ten_loai, $ma_loai);
    setcookie('message', 'Sửa dữ liệu thành công', time() + 1);
    header("location: ?ctl=loai-hang");
    die;
}

// delete loại
function delete_loai() {
    $ma_loai = $_GET['id'];
    loai_delete($ma_loai);
    setcookie('message', 'Xoá dữ liệu thành công', time() + 1);
    header("location: ?ctl=loai-hang");
    die;
}
?>