<?php

// 
function order_list() {
    $ma_kh = $_SESSION['user']['ma_kh'];
    $orders = donhang_by_kh_all($ma_kh);
    $content = "order_list.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orders' => $orders]);
}

function order_detail() {
    $id = $_GET['ma_dh'] ?? '';
    $orderDetail =  donhang_detail_by_id($id);
    $content = "order_detail.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orderDetail' => $orderDetail]);
}

function order_cancel()
{
    $ma_dh = $_GET['ma_dh'];
    order_cancel_by_id($ma_dh);
    header("location: ?ctl=order-list");
    die;
}

?>