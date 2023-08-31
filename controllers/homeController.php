<?php
function home_page() {
    $top10 = hanghoa_top_10();
    $dac_biet = hanghoa_dac_biet();
    shuffle($dac_biet);
    $list_loai = loai_all();
    $view_name = "views/site/home/homePage.php";
    view('layout/layout', ['view_name' => $view_name, 'top10' => $top10, 'dac_biet' => $dac_biet, 'list_loai' => $list_loai]);

}

function about_page() {
    $view_name = "views/site/about/gioi-thieu.php";
    view('layout/layout', ['view_name' => $view_name]);
}

function contact_page() {
    $view_name = "views/site/contact/lien-he.php";
    view('layout/layout', ['view_name' => $view_name]);
}

function abc() {
    $view_name = "views/layout/nhap.php";
    view('layout/layout', ['view_name' => $view_name]);
}
?>