<?php
    require '../../global.php';
    require "../../dao/pdo.php";
    require '../../dao/danhmuc.php';
    require '../../dao/khachHang.php';
    require '../../dao/hanghoa.php';
    require "../validate-form.php";


    
    extract($_REQUEST);
    if(exsist_param("btn_change_info")) {
        $list = 'change_info_form.php';
    }
    else if(exsist_param("btn_update_info")) {
        $errors = validateChangeInfo($ho_ten, $email) + ($_FILES['hinh']['name'] ? validateFileImg('hinh') : []);

        if(empty($errors)) {
            $up_hinh = save_file('hinh', "$image_dir/image_user/");
            $hinh =  strlen($up_hinh) > 0 ? $up_hinh : $_POST['old_hinh'];
            try {
                user_update($ma_kh, $ho_ten, $hinh, $email);
                $MESSAGE_SUCCESS = "Cập nhật thành công!";
                $_SESSION['user'] = khachHang_select_by_id($ma_kh);
                if(get_cookie('info-user')) {
                    add_cookie('info-user', serialize(khachHang_select_by_id($ma_kh)), 30);
                }
            }
            catch (Exception $exc) {
                $MESSAGE_ERROR = "Cập nhật không thành công!";
            }
            $list = 'info-user.php';
        }
        else {
            $list = 'change_info_form.php';
        }
    }
    else if(exsist_param("btn_change_pass")) {
        $list = 'change_pass_form.php';
    }
    else if(exsist_param("btn_update_pass")) {
        $errors = validateChangePassword($mat_khau, $mat_khau2, $mat_khau3);
        if(empty($errors)) {
            $user = khachHang_select_by_id($ma_kh);
            if($user) {
                if($user['mat_khau'] == $mat_khau) {
                    try {
                        user_change_password($ma_kh, $mat_khau2);
                        $MESSAGE_SUCCESS = "Đổi mật khẩu thành công!";
                        $list = 'info-user.php';
                    }
                    catch (Exception $exc) {
                        $MESSAGE_ERROR = "Đổi mật khẩu thất bại!";
                        $list = 'info-user.php';
                    }
                }
                else {
                    $MESSAGE_ERROR = "Sai mật khẩu cũ!";
                    $list = 'change_pass_form.php';
                }
            }
            else {
                $MESSAGE_ERROR = "Sai mã đăng nhập!";
                $list = 'change_pass_form.php';
            }
        }
        else {
            $list = 'change_pass_form.php';
        }
    }
    else {
        $list = 'info-user.php';
    }

    $user = $_SESSION['user'];

    
    $MESSAGE = "Thông tin tài khoản";
    $dsloai = danhMuc_selectAll();
    $top10 = hang_hoa_top_10();

    $view_name = '../content-layout.php';
    require '../layout.php'
?>