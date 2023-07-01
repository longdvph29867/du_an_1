<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/khachhang.php";
require_once "../../../controllers/loginController.php";
require_once "../../validate/validate-form.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'register':
        register_page();
        break;
    case 'login':
        login_page();
        break;
    case 'quen-mk':
        quen_mk_page();
        break;
    case 'quen-mk':
        quen_mk_page();
        break;
    case 'register-khachhang':
        register_khachhang();
        break;
    case 'login-khachhang':
        login_khachhang();
        break;
    case 'change-pass':
        get_pass();
        break;
    default:
        echo "404 NOT FOUND!";
        // view('layout/layout');
}

?>
