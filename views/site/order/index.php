<?php
require_once "../../../config.php";
require_once "../../../function.php";
require_once "../../validate/validate-form.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../models/hanghoa.php";
require_once "../../../models/donhang.php";
require_once "../../../models/danhgia.php";
require_once "../../../models/giohang.php";
require_once "../../../models/vanchuyen.php";
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
    case 'order-review-insert':
        order_review_insert();
        break;
    case 'order':
        order();
        break;
    case 'order-insert':
        order_insert();
        break;
    case 'order-da-nhan-hang':
        order_da_nhan_hang();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
