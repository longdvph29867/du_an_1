<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../models/hanghoa.php";
require_once "../../../controllers/ad_hanghoaController.php";
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
    case 'hh-insert-hinh':
        ad_hanghoa_add_hinh();
        break;
    case 'hh-delete-hinh':
        ad_delete_hinh();
        break;
    case 'ad-add-thuoctinh':
        ad_add_thuoctinh();
        break;
    case 'ad-insert-thuoctinh':
        ad_insert_thuoctinh();
        break;
    case 'ad-sua-thuoctinh':
        ad_sua_thuoctinh();
        break;
    case 'ad-update-thuoctinh':
        ad_update_thuoctinh();
        break;
    case 'ad-delete-thuoctinh':
        ad_delete_thuoctinh();
        break;
    case 'ad-sua-thongtin':
        ad_sua_thongtin();
        break;
    case 'ad-update-thongtin':
        ad_update_thongtin();
        break;
    case 'ad-delete-hh':
        ad_delete_hh();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
