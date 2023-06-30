<?php
//Database
$config['host'] = 'localhost';
$config['dbname'] = 'food_market';
$config['user'] = 'root';
$config['password'] = '';

session_start();
//Message
const url = "/du_an_1";
const url_public = "public";
const url_views = url . "/views";
const url_admin = url_views . "/admin";
const url_site = url_views . "/site";
$image_dir = $_SERVER['DOCUMENT_ROOT']. url . "/content/images";
$MESSAGE = "";
$MESSAGE_SUCCESS = "";
$MESSAGE_ERROR = "";
$errors = [];

// lấy ngày hiện tại
date_default_timezone_set('Asia/Ho_Chi_Minh');
$TODAY = date('Y-m-d');
?>
