<?php
function home_page() {
    $top10 = hanghoa_top_10();
    $view_name = "views/site/home/homePage.php";
    view('layout/layout', ['view_name' => $view_name, 'top10' => $top10]);

}
function abc() {
    $view_name = "views/layout/nhap.php";
    view('layout/layout', ['view_name' => $view_name]);
}
?>