<?php

// 
function register_page() {
    $view_name = "register.php";
    view('site/login/layout', ['view_name' => $view_name]);
}

function login_page() {
    $view_name = "login.php";
    $MESSAGE_SUCCESS = $_COOKIE['MESSAGE_SUCCESS'] ?? '';
    view('site/login/layout', ['view_name' => $view_name, 'MESSAGE_SUCCESS' => $MESSAGE_SUCCESS]);
}


function quen_mk_page() {
    $view_name = "quen-mat-khau.php";
    view('site/login/layout', ['view_name' => $view_name]);
}

function register_khachhang() {
    global $image_dir;
    extract($_REQUEST);
    
    $errors = validateRegister ($ma_kh, $mat_khau,$re_password, $ho_ten, $sdt, $email) + ($_FILES['hinh']['name'] ? validateFileImg('hinh') : []);
    if(empty($errors)) {
        if (khachHang_select_by_id($ma_kh)) {
            $view_name = "register.php";
            view('site/login/layout', ['view_name' => $view_name], [], $_POST);
            echoMesssage(false, "Tài khoản đã tồn tại!");
            
        }
        else {
            if(strlen($_FILES['hinh']['name']) != 0) {
                $up_hinh = save_file('hinh', "$image_dir/users/");
                $hinh = $up_hinh;
                
            }
            else {
                $hinh = 'user2.jpeg';
            }
            khachhang_insert($ma_kh, $mat_khau, $ho_ten, $hinh, $sdt, $email);
            addMesssage(true, "Đăng ký thành công vui lòng đăng nhập!");
            header("location: ?ctl=login");
            die;
        }
    }
    else {
        $view_name="register.php";
        view('site/login/layout', ['view_name' => $view_name], $errors, $_POST );
    }
}

function login_khachhang() {
    extract($_REQUEST);
    
    $errors = validateLogin($ma_kh, $mat_khau);
        if(empty($errors)) {
            $user = khachHang_select_by_id($ma_kh);
            if($user) {
                if($user['hoat_dong'] == 1) {
                    if($user['mat_khau'] == $mat_khau) {
                        // 
                        if(exsist_param("ghi_nho")) {
                            add_cookie('info-user', serialize($user), 30);
                        }
                        $_SESSION['user'] = $user;
                        addMesssage(true, "Đăng nhập thành công!");
                        header("location: ".url);
                    }
                    else {
                        $view_name="login.php";
                        view('site/login/layout', ['view_name' => $view_name], [], $_POST);
                        echoMesssage(false, "Tài khoản hoặc mật khẩu không đúng!");
                    }
                }
                else {
                    $view_name="login.php";
                    view('site/login/layout', ['view_name' => $view_name], [], $_POST);
                    echoMesssage(false, "Tài khoản đã bị xoá!");
                }
            }
            else {
                $view_name="login.php";
                view('site/login/layout', ['view_name' => $view_name], [], $_POST);
                echoMesssage(false, "Tài khoản hoặc mật khẩu không đúng!");
            }
        }
        else {
            $view_name="login.php";
            view('site/login/layout', ['view_name' => $view_name], $errors, $_POST);
        }
}

function get_pass() {
    extract($_REQUEST);
    
    $errors = validateGetPassword($ma_kh, $email);
        if(empty($errors)) {
            $user = khachHang_select_by_id($ma_kh);
            if($user) {
                if($user['email'] == $email) {
                    $MESSAGE_SUCCESS = "Mật khẩu của bạn là: $user[mat_khau]";
                    setcookie('MESSAGE_SUCCESS', $MESSAGE_SUCCESS, time() + 1);

                    $view_name="login.php";
                    header("location: ?ctl=login");
                }
                else {
                    $MESSAGE_ERROR = "Sai địa chỉ email!";
                    $view_name="quen-mat-khau.php";
                    view('site/login/layout', ['view_name' => $view_name, 'MESSAGE_ERROR' => $MESSAGE_ERROR], [], $_POST);
                }
            }
            else {
                $MESSAGE_ERROR = "Sai tên đăng nhập!";
                $view_name="quen-mat-khau.php";
                view('site/login/layout', ['view_name' => $view_name, 'MESSAGE_ERROR' => $MESSAGE_ERROR], [], $_POST);
            }
        }
        else {
            $view_name="quen-mat-khau.php";
            view('site/login/layout', ['view_name' => $view_name], $errors, $_POST);
        }
}

?>