<?php
require_once 'config.php';
require_once "function.php";
require_once "models/connection.php";
require_once "models/loai.php";
require_once "controllers/loaiController.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'home':
        echo "home";
        break;
    case 'about':
        echo "about";
        break;
    case 'loai-hang':
        list_loai();
        break;
    case 'add-loai':
        add_loai();
        break;
    case 'store-loai':
        store_loai();
        break;
    case 'edit-loai':
        show_loai();
        break;
    case 'del-loai':
        delete_loai();
        break;
    default:
        echo "404 NOT FOUND!";
    
}

?>
