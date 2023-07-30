<?php
require_once "../../../config.php";
require_once "../../../function.php";
require_once "../../validate/validate-form.php";
require_once "../../../models/connection.php";
require_once "../../../models/loai.php";
require_once "../../../models/hanghoa2.php";
require_once "../../../models/donhang.php";
require_once "../../../models/danhgia.php";
require_once "../../../controllers/listProductsController.php";

$ctl = $_GET['ctl'] ?? '';
if(isset($_GET['keywords'])) {
    $ctl = 'keywords';
};

switch ($ctl) {
    case '':
    case 'products':
        products_list();
        break;
    case 'category':
        products_category();
        break;
    case 'keywords':
        products_search();
        break;
    default:
        echo "404 NOT FOUND!";
}

?>
