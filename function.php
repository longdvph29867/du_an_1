<?php
function view($path, $data = [])
{
    extract($data);
    include_once "views/" . $path . ".php";
}
function exsist_param($fieldName){
    return array_key_exists($fieldName,$_REQUEST);
}

// lưu file vào forder
function save_file($fieldname, $target_dir) {
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded['name']);
    $target_path = $target_dir.$file_name;
    move_uploaded_file($file_uploaded['tmp_name'], $target_path);
    return $file_name;
}

// thêm dữ liệu vào cookie
function add_cookie($name, $value, $day) {
    setcookie($name, $value, time() + (84600 * $day), '/');
}

// xoá dữ liệu khỏi cookie
function delete_cookie($name) {
    add_cookie($name, '', -1);
}

// lấy dữ liệu từ cookie
function get_cookie($name) {
    return $_COOKIE[$name] ?? '';
}

//  kiểm tra đăng nhập
function check_login() {
    global $url_site;
    if(isset($_SESSION['user'])) {
        if($_SESSION['user']['vai_tro'] == 1) {
            return;
        }
        if(strpos($_SERVER['REQUEST_URI'], '/admin/') == false) {
            return;
        }
    }
    header("location: $url_site/tai-khoan/index.php?btn_form_login");
}

// lấy thông tin từ cookie nếu ghi nhớ mật khẩu
if(get_cookie('info-user')) {
    $_SESSION['user'] = unserialize(get_cookie('info-user'));
}

// tính phần trăm giảm giá
function discountPrecent ($price, $discount) {
    return $discount/($price/100);
}
?>
