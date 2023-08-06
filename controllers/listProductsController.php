<?php

function products_list() {

    if(isset($_GET['filter'])) {
        $listSanPhamAll = hanghoa_all([],$_GET['filter']);
    }
    else {
        $listSanPhamAll = hanghoa_all();
        
    }

    // $listSanPhamAll = hanghoa_all();
    // echo '<pre>';
    // print_r($listSanPhamAll);
    // echo '</pre>';
    $productsTotal = count($listSanPhamAll);

    $thisPage= $_GET['page'] ?? 1;
    $arrListByPage = array_chunk($listSanPhamAll, 12);
    $pageTotal = ceil(count($arrListByPage));
    $items = $arrListByPage[$thisPage-1];

    $name_page = "Danh Sách Hàng Hoá";
    $content = "liet-ke.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', [
        'view_name' => $view_name, 
        'content' => $content, 
        'items' => $items, 
        'pageTotal' => $pageTotal, 
        'productsTotal' => $productsTotal, 
        'name_page' => $name_page
    ]);
}

function products_category() {
    $ma_loai = $_GET['ma_loai'];
    if(isset($_GET['filter'])) {
        $listSanPhamAll = hanghoa_all(['ma_loai' => $ma_loai], $_GET['filter']);
    }
    else {
        $listSanPhamAll = hanghoa_all(['ma_loai' => $ma_loai]);
    }
    // echo '<pre>';
    // print_r($listSanPhamAll);
    // echo '</pre>';
    $productsTotal = count($listSanPhamAll);

    $thisPage= $_GET['page'] ?? 1;
    $arrListByPage = array_chunk($listSanPhamAll, 12);
    $pageTotal = ceil(count($arrListByPage));
    $items = $arrListByPage[$thisPage-1];

    $name_page = "Danh Sách Hàng Hoá";
    $content = "liet-ke.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', [
        'view_name' => $view_name, 
        'content' => $content, 
        'items' => $items, 
        'pageTotal' => $pageTotal, 
        'productsTotal' => $productsTotal, 
        'name_page' => $name_page
    ]);
}

function products_search() {

    $key = $_GET['keywords'];
    if(isset($_GET['filter'])) {
        $listSanPhamAll = hanghoa_search($key, $_GET['filter']);
    }
    else {
        $listSanPhamAll = hanghoa_search($key);
    }

    // echo '<pre>';
    // print_r($listSanPhamAll);
    // echo '</pre>';
    $productsTotal = count($listSanPhamAll);

    if(count($listSanPhamAll) != 0) {
        $thisPage= $_GET['page'] ?? 1;
        $arrListByPage = array_chunk($listSanPhamAll, 12);
        $pageTotal = ceil(count($arrListByPage));
        $items = $arrListByPage[$thisPage-1];
    }
    else {
        $pageTotal = 0;
        $items = $listSanPhamAll;
    };

    $name_page = "Danh Sách Hàng Hoá";
    $content = "liet-ke.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', [
        'view_name' => $view_name, 
        'content' => $content, 
        'items' => $items, 
        'pageTotal' => $pageTotal, 
        'productsTotal' => $productsTotal, 
        'name_page' => $name_page
    ]);
}



?>
