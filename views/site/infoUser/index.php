<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../models/hanghoa2.php";
require_once "../../../models/khachhang.php";
require_once "../../../controllers/infoUserController.php";
require_once "../../validate/validate-form-admin.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'info-user':
        get_info_user();
        break;
    case 'form_change_pass':
        form_change_pass();
        break;
    case 'update_pass':
        update_pass();
        break;

    case 'form_change_info':
        form_change_info();
        break;
    case 'update_info':
        update_info();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
