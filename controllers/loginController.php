<?php
function home_page() {
    $top10 = hanghoa_top_10();
    $dac_biet = hanghoa_dac_biet();
    $list_loai = loai_all();
    $view_name =  "views/site/home/homePage.php";
    view('layout/layout', ['view_name' => $view_name, 'top10' => $top10, 'dac_biet' => $dac_biet, 'list_loai' => $list_loai]);

}


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
    
    $errors = validateRegister ($ma_kh, $mat_khau,$re_password, $ho_ten, $sdt, $email) + validateFileImg('hinh');
    if(empty($errors)) {
        if (khachHang_select_by_id($ma_kh)) {
            $MESSAGE_ERROR = 'Tài khoản đã tồn tại!';
            $view_name = "register.php";
            view('site/login/layout', ['view_name' => $view_name, 'MESSAGE_ERROR' => $MESSAGE_ERROR], [], $_POST);
            
        }
        else {
            $up_hinh = save_file('hinh', "$image_dir/users/");
            $hinh = $up_hinh;
            setcookie('MESSAGE_SUCCESS', 'Đăng ký thành công', time() + 1);
            khachhang_insert($ma_kh, $mat_khau, $ho_ten, $hinh, $sdt, $email);
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
                if($user['mat_khau'] == $mat_khau) {
                    // 
                    if(exsist_param("ghi_nho")) {
                        add_cookie('info-user', serialize($user), 30);
                    }
                    $_SESSION['user'] = $user;
                    header("location: ".url);
                }
                else {
                    $MESSAGE_ERROR = 'Sai mật khẩu!';
                    $view_name="login.php";
                    view('site/login/layout', ['view_name' => $view_name, 'MESSAGE_ERROR' => $MESSAGE_ERROR], [], $_POST);
                }
            }
            else {
                $MESSAGE_ERROR = 'Sai tài khoản!';
                $view_name="login.php";
                view('site/login/layout', ['view_name' => $view_name, 'MESSAGE_ERROR' => $MESSAGE_ERROR], [], $_POST);
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