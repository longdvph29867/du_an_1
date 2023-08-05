<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../models/giohang.php";
require_once "../../../controllers/giohangController.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'gio-hang':
        giohang_page();
        break;
    case 'gh-delete':
        delete_giohang();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
