<?php
function view($path, $data = [], $errors = [], $value = [])
{
    extract($data);
    extract($value);
    include_once "views/" . $path . ".php";
}
function exsist_param($fieldName){
    return array_key_exists($fieldName,$_REQUEST);
}

// lưu 1 file vào forder
function save_file($fieldname, $target_dir) {
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded['name']);
    $target_path = $target_dir.$file_name;
    move_uploaded_file($file_uploaded['tmp_name'], $target_path);
    return $file_name;
}

// lưu n file vào forder
function save_files($fieldname, $target_dir) {
    $arrNameFile = [];
    for ($i = 0; $i < count($_FILES[$fieldname]["name"]); $i++) {
        $file_name = $_FILES[$fieldname]["name"][$i];
        $file_tmp = $_FILES[$fieldname]["tmp_name"][$i];

        $target_path = $target_dir.$file_name;
        move_uploaded_file($file_tmp, $target_path);

        $arrNameFile[] = $file_name;
    }
    return $arrNameFile;
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

function addMesssage($status, $messageContent) {
    if($status) {
        $statusStr = 'true';
    }
    else {
        $statusStr = 'false';

    }
    setcookie('message', "<script>showMesssage($statusStr, '$messageContent')</script>", time() + 2, '/');
}
function echoMesssage($status, $messageContent) {
    if($status) {
        $statusStr = 'true';
    }
    else {
        $statusStr = 'false';
    }
    echo "<script>showMesssage($statusStr, '$messageContent')</script>";
}
// addMesssage(true, "Bình luận thành công");

function tongSLKho($data)
{
    $tongSLKho = 0;
    foreach ($data as $item) {
        $tongSLKho += $item['so_luong'];
    };
    return $tongSLKho;
}

function maxMinPrice($data)
{
    $min = reset($data)['don_gia'];
    $max = reset($data)['don_gia'];

    foreach ($data as $item) {
        
        if($min > $item['don_gia']) {
            $min = $item['don_gia'];
        };
        if($max < $item['don_gia']) {
            $max = $item['don_gia'];
        };
    };
    return ['min' => $min, 'max' => $max];
}
?>

