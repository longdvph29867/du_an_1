<?php

function products_list() {
    $listSanPhamAll = hanghoa_all();
    $thisPage= $_GET['page'] ?? 1;
    $arrListByPage = array_chunk($listSanPhamAll, 12);
    $pageTotal = ceil(count($arrListByPage));
    $items = $arrListByPage[$thisPage-1];
    $content = "liet-ke.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'items' => $items, 'pageTotal' => $pageTotal]);
}

function products_category() {
    $ma_loai = $_GET['ma_loai'];
    $items = hanghoa_by_ma_loai($ma_loai);
    $content = "liet-ke.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'items' => $items]);
}

function products_search() {
    $key = $_GET['keywords'];
    $items = hanghoa_search($key);
    $content = "liet-ke.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'items' => $items]);
}

?>