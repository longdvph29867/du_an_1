<?php
function home_page() {
    $view_name = "views/site/home/homePage.php";
    view('layout/layout', ['view_name' => $view_name]);

}
function abc() {
    $view_name = "views/layout/nhap.php";
    view('layout/layout', ['view_name' => $view_name]);
}
?>