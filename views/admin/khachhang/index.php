<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/khachhang.php";
require_once "../../../controllers/ad_khachhangController.php";
require_once "../../validate/validate-form-admin.php";

$ctl = $_GET['ctl'] ?? '';
if(isset($_GET['search'])) {
    $ctl = 'search';
};
switch ($ctl) {
    case '':
    case 'ad-list-kh':
        ad_list_kh();
        break;
    case 'ad-add':
        ad_add_khachhang();
        break;
    case 'ad-update-kh':
        ad_sua_khachhang();
        break;
    case 'khachhang-insert':
        ad_insert_khachhang();
        break;
    case 'khachhang-update':
        ad_khachhang_update();
        break;
    case 'khachhang-delete':
        ad_khachhang_delete();
        break;
    case 'search':
        ad_khachhang_search();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
