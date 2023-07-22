<?php
function giohang_page() {
    $ma_kh = $_SESSION['user']['ma_kh'];
    // echo $ma_kh;
    $giohang=giohang_by_ma_kh($ma_kh);
    // echo '<pre>';
    // print_r($giohang);
    // echo '</pre>';
    $view_name = url_documentRoot . "/views/site/giohang/giohang.php";
    view('/layout/layout', ['view_name' => $view_name, 'giohang' => $giohang]);
}
// hien thi danh sach loai hang
function list_loai() {
    $giohang = loai_all();
    $message = $_COOKIE['message'] ?? '';
    view('/layout/layout', ['gio_hang' => $giohang, 'message' => $message]);
}
// add
function add_loai() {
    view('/layout/layout');
}
// them du lieu vao database
function store_giohang() {
    $ten_loai = $_POST['ma_gh'];
    loai_insert($ten_loai);
    setcookie('message', 'Thêm vào giỏ hàng thành công', time() + 1);
    header("location: ?ctl=gio_hang");
    die;
}

// lấy show thông tin 1 lại hàng
function show_giohang() {
    $ma_gh = $_GET['id'];
    $giohang = loai_select_by_id($ma_gh);
    view('/layout/layout', ['gio_hang' => $giohang]);
}



// delete giỏ hàng 
function delete_giohang() {
    $ma_gh = $_GET['id'];
    gh_delete($ma_gh);
    setcookie('message', 'Xoá thông tin giỏ hàng thành công', time() + 1);
    header("location: ?ctl=gio-hang");
    die;
}
?>