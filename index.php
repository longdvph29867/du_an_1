<?php
require_once 'config.php';
require_once "function.php";
require_once "models/connection.php";
require_once "models/loai.php";
require_once "models/hanghoa.php";
require_once "controllers/homeController.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'home':
        home_page();
        break;
    case 'about':
        about_page();
        break;
    case 'contact':
        contact_page();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
