<?php
    require "../../global.php";
    require "../../dao/pdo.php";
    require "../../dao/khachHang.php";
    require "../validate-form.php";
    
    extract($_REQUEST);
    if(exsist_param("btn_insert")){
        $errors = validateRegister ($ma_kh, $mat_khau,$re_password, $ho_ten, $email) + validateFileImg('hinh');
        if(empty($errors)) {
            if (khachHang_select_by_id($ma_kh)) {
                $MESSAGE_ERROR = 'Tài khoản đã tồn tại!';
                $view_name="register.php";
            }
            else {
                $up_hinh = save_file('hinh', "$image_dir/image_user/");
                $hinh = $up_hinh;
                try {
                    user_register($ma_kh, $mat_khau, $ho_ten, $hinh, $email);
                    $MESSAGE_SUCCESS = "Đăng ký thành công";
                    $view_name="login.php";
                }
                catch (Exception $exc) {
                    $MESSAGE_ERROR = "Đăng ký không thành công!";
                    $view_name="register.php";
                }
            }
        }
        else {
            $view_name="register.php";
        }
        
    }
    else if (exsist_param("btn_get_password")) {
        $errors = validateGetPassword($ma_kh, $email);

        if(empty($errors)) {

            $user = khachHang_select_by_id($ma_kh);
            if($user) {
                if($user['email'] == $email) {
                    $MESSAGE_SUCCESS = "Mật khẩu của bạn là: $user[mat_khau]";
                    $view_name="login.php";
                }
                else {
                    $MESSAGE_ERROR = "Sai địa chỉ email!";
                    $view_name="quen-mat-khau.php";
                }
            }
            else {
                $MESSAGE_ERROR = "Sai tên đăng nhập!";
                $view_name="quen-mat-khau.php";
            }
        }
        else {
            $view_name="quen-mat-khau.php";
        }

    }
    else if (exsist_param("btn_login")) {
        $errors = validateLogin($ma_kh, $mat_khau);
        if(empty($errors)) {
            $user = khachHang_select_by_id($ma_kh);
            if($user) {
                if($user['mat_khau'] == $mat_khau) {
                    // 
                    if(exsist_param("ghi_nho")) {
                        add_cookie('info-user', serialize($user), 30);
                    }
                    $_SESSION['user'] = $user;
                    header("location: $url_site/trang-chinh");
                }
                else {
                    $MESSAGE_ERROR = 'Sai mật khẩu!';
                    $view_name="login.php";
                }
            }
            else {
                $MESSAGE_ERROR = 'Sai tài khoản!';
                $view_name="login.php";
            }
        }
        else {
            $view_name="login.php";
        }


    }
    else if (exsist_param("btn_form_login")) {
        $view_name="login.php";
    }
    else if (exsist_param("btn_forgot")) {
        $view_name="quen-mat-khau.php";
    }
    else {
        $view_name="register.php";
    }
    require "layout.php";
