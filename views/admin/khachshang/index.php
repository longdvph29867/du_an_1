<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../controllers/ad_loaiController.php";
require_once "../../../models/khachhang.php";
require_once "../../../controllers/ad_khachhangController.php";
require_once "../../validate/validate-form-admin.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    
    default:
        echo "404 NOT FOUND!";
}

?>
