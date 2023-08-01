<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/donhang.php";
require_once "../../../controllers/ad_donhangController.php";
require_once "../../validate/validate-form-admin.php";

$ctl = $_GET['ctl'] ?? '';
if(isset($_GET['search'])) {
    $ctl = 'search';
};

switch ($ctl) {
    case '':
    case 'ad-list':
        ad_donhang_list();
        break;
    case 'ad-update':
        ad_update_trangthai();
        break;

    case 'ad-add':
        ad_add_loai();
        break;
    case 'loai-insert':
        ad_insert_loai();
        break;
    case 'loai-update':
        ad_loai_update();
        break;
    case 'loai-delete':
        ad_loai_delete();
        break;
    case 'search':
        ad_loai_search();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
