<?php
function ad_home_page() {
    $view_name = "home/home.php";
    view('layout/layout-admin', ['view_name' => $view_name]);
}
?>