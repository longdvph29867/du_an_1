<?php

function get_info_user() {
    $user = $_SESSION['user'];

    $name_page = "Thông tin tài khoản";
    $content = "info-user.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'user' => $user, 'name_page' => $name_page]);
}

function form_change_pass() {
    $user = $_SESSION['user'];

    $name_page = "Đổi mật khẩu";
    $content = "change_pass_form.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'user' => $user, 'name_page' => $name_page]);
}

function update_pass() {
    $user = $_SESSION['user'];
    $errors = validateChangePassword($_POST);
    $name_page = "Đổi mật khẩu";

        if(empty($errors)) {
            $userData = khachHang_select_by_id($user['ma_kh']);
            if($userData) {
                if($userData['mat_khau'] == $_POST['mat_khau']) {
                    khachhang_update_password($_POST);
                    addMesssage(true, "Đổi mật khẩu thành công!!");
                    header("location: ?ctl=info-user");
                }
                else {
                    $content = "change_pass_form.php";
                    $view_name = "../../layout/content-layout/content-layout.php";
                    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'user' => $user, 'name_page' => $name_page]);
                    echoMesssage(false, "Mật khẩu cũ không đúng!");
                }
            }
            else {
                $content = "change_pass_form.php";
                $view_name = "../../layout/content-layout/content-layout.php";
                view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'user' => $user, 'name_page' => $name_page]);
                echoMesssage(false, "Mật khẩu cũ không đúng!");
            }
        }
        else {
            $content = "change_pass_form.php";
            $view_name = "../../layout/content-layout/content-layout.php";
            view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'user' => $user, 'name_page' => $name_page], $errors);
        }
}

function form_change_info() {
    $user = $_SESSION['user'];

    $name_page = "Cập nhật tài khoản";
    $content = "change_info_form.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'user' => $user, 'name_page' => $name_page]);
}

function update_info() {
    global $image_dir;
    $user = $_SESSION['user'];
    $errors = validateChangeInfo($_POST) + ($_FILES['hinh']['name'] ? validateFileImg('hinh') : []);
    $name_page = "Cập nhật tài khoản";
    if(empty($errors)) {
        $up_hinh = save_file('hinh', "$image_dir/users/");
        $hinh =  strlen($up_hinh) > 0 ? $up_hinh : $_POST['old_hinh'];
        $data = [
            'ma_kh' => $_POST['ma_kh'],
            'ho_ten' => $_POST['ho_ten'],
            'email' => $_POST['email'],
            'sdt' => $_POST['sdt'],
            'hinh' => $hinh,
        ];
        khachhang_update_info($data);
        $_SESSION['user'] = khachHang_select_by_id($data['ma_kh']);
        if(get_cookie('info-user')) {
            add_cookie('info-user', serialize(khachHang_select_by_id($data['ma_kh'])), 30);
        }
        addMesssage(true, "Cập hật tài khoản thành công!");
        header("location: ?ctl=info-user");
    }
    else {
        $content = "change_info_form.php";
        $view_name = "../../layout/content-layout/content-layout.php";
        view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'user' => $user, 'name_page' => $name_page], $errors);
    }
}
    // echo '<pre>';
    // print_r($user);
    // echo '</pre>';

?>