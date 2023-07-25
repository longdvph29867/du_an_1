<?php
require_once '../../config.php';
require_once "../../function.php";
require_once "../../models/connection.php";
require_once "../../controllers/ad_homeController.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'ad-loai':
        ad_home_page();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
