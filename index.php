<?php
require_once 'config.php';
require_once "function.php";
require_once "models/connection.php";
require_once "models/loai.php";
require_once "models/hanghoa2.php";
require_once "controllers/homeController.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'home':
        home_page();
        break;
    case 'about':
        echo "about";
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
