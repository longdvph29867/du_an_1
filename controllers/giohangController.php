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

// delete 1sp trong giỏ hàng 
function delete_giohang() {
    $ma_gh = $_GET['id'];
    gh_delete($ma_gh);
    setcookie('message', 'Xoá thông tin giỏ hàng thành công', time() + 1);
    header("location: ". url_site. '/giohang/');
    die;
}
?>