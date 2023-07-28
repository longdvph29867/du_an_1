<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../models/hanghoa.php";
require_once "../../../controllers/ad_hanghoaController.php";
require_once "../../../models/khachhang.php";
require_once "../../../controllers/ad_khachhangController.php";
require_once "../../validate/validate-form-admin.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'ad-list':
        ad_hanghoa_list();
        break;
    case 'ad-add':
        ad_add_hanghoa();
        break;
    case 'ad-detail-hh':
        ad_chitet_hh();
        break;
    case 'hh-insert':
        ad_insert_hanghoa();
        break;
    case 'loai-update':
        ad_loai_update();
        break;
    case 'loai-delete':
        ad_loai_delete();
        break;
    case 'ad-search':
        ad_loai_search();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
