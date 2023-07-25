<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../controllers/ad_loaiController.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'ad-home':
        ad_loai_list();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
