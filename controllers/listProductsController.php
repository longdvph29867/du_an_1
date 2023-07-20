<?php

function products_list() {
    $items = hanghoa_all();
    $content = "liet-ke.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'items' => $items]);
}

function products_category() {
    $ma_loai = $_GET['ma_loai'];
    $items = hanghoa_by_ma_loai($ma_loai);
    $content = "liet-ke.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'items' => $items]);
}

?>