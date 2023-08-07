<?php
//Database
$config['host'] = 'localhost';
$config['dbname'] = 'food_market';
$config['user'] = 'root';
$config['password'] = '';

session_start();
//Message
define('url_documentRoot', $_SERVER['DOCUMENT_ROOT'] . '/du_an_1');
const url = "/du_an_1";
const url_public = url . "/public";
const url_views = url . "/views";
const url_admin = url_views . "/admin";
const url_site = url_views . "/site";
$image_dir = url_documentRoot . "/public/images";
$MESSAGE = "";
$MESSAGE_SUCCESS = "";
$MESSAGE_ERROR = "";
$errors = [];

// lấy ngày hiện tại
date_default_timezone_set('Asia/Ho_Chi_Minh');
$TODAY = date('Y-m-d');
// $TODAY = '2023-7-3';

$ngay_hien_tai = new DateTime();
$danh_sach_thang = array();

for ($i = 0; $i < 6; $i++) {
    $danh_sach_thang[] = $ngay_hien_tai->format('m');

    // Di chuyển đến tháng trước đó
    $ngay_hien_tai->modify('-1 month');
}
// Đảo ngược mảng để có danh sách 6 tháng gần nhất từ cũ đến mới
// $danh_sach_thang = array_reverse($danh_sach_thang);
?>
