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
        ad_hanghoa_add_hinh();
        break;
    
    default:
        echo "404 NOT FOUND!";
}

?>
