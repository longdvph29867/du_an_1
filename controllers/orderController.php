<?php

// 
function order_list() {
    $ma_kh = $_SESSION['user']['ma_kh'];
    $orders = donhang_by_kh_all($ma_kh);
    $content = "order_list.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orders' => $orders]);
}



?>