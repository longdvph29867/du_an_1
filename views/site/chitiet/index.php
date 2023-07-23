<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../models/binhluan.php";
require_once "../../../models/danhgia.php";
require_once "../../../models/hanghoa.php";
require_once "../../../models/giohang.php";
require_once "../../../controllers/hanghoact.php";
require_once "../../validate/validate-form.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
        hanghoact();
        break;
    case 'add-cart':
        hanghoact_add_cart();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
