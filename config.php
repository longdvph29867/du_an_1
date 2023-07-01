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
?>
