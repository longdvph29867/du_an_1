<?php
require_once '../../../config.php';
require_once "../../../function.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../models/binhluan.php";
require_once "../../../models/danhgia.php";
require_once "../../../models/hanghoa.php";
require_once "../../../controllers/hanghoact.php";

$ctl = $_GET['ctl'] ?? '';

switch ($ctl) {
    case '':
    case 'chitiet':
        hanghoact();
        break;
        case 'about':
            echo "about";
            break;
    default:
        echo "404 NOT FOUND!";
}

?>
