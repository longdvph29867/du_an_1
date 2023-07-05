<?php
require_once "../../../config.php";
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../models/hanghoa2.php";
require_once "../../../models/donhang.php";
require_once "../../../controllers/orderController.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'order-list':
        order_list();
        break;
    case 'order-detail':
        order_detail();
        break;
    case 'order-cancel':
        order_cancel();
        break;
    case 'order-review':
        order_review();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
