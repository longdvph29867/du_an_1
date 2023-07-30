<?php

function validateFileImg($hinh) {
    $errors = [];
    $typeImg = ['png', 'jpg', 'jpeg', 'webp'];
    $typeFile = pathinfo($_FILES[$hinh]['name'], PATHINFO_EXTENSION);
    if (strlen($_FILES[$hinh]['name']) == 0) {
        $errors['hinh'] = 'Vui lòng chọn file!';
    } 
    else if(!in_array(strtolower($typeFile), $typeImg)){
        $errors['hinh'] = 'File phải có định dạng là png, jpg, jpeg, webp!';
    }
    else if($_FILES[$hinh]['size'] > (2 * 1024 * 1024)) {
        $errors['hinh'] = 'Kích thước không quá 2 MB!';
    }
    else if(strlen($_FILES[$hinh]['name']) > 46) {
        $errors['hinh'] = 'Tên file quá dài!';
    }
    return $errors;
}

function validateInsertLoai($ten_loai) {
    $errors = [];
    if (strlen($ten_loai) == 0) {
        $errors['ten_loai'] = "Vui lòng nhập tên loại!";
    } else if (strlen($ten_loai) > 49) {
        $errors['ten_loai'] = "Tên loại không quá 50 ký tự!";
    }

    return $errors;
}

function validateInsertKH_ad($data) {
    extract($data);
    $errors = [];
    // ma kh
    if (strlen($ma_kh) == 0) {
        $errors['ma_kh'] = "Vui lòng nhập tài khoản!";
    } else if (strlen($ma_kh) > 16 || strlen($ma_kh) < 6) {
        $errors['ma_kh'] = "Tài khoản phải 6 - 16 ký tự!";
    }

    // mat_khau
    if (strlen($mat_khau) == 0) {
        $errors['mat_khau'] = "Vui lòng nhập mật khẩu!";
    } else if (strlen($mat_khau) > 16 || strlen($mat_khau) < 6) {
        $errors['mat_khau'] = "Mật khẩu phải 6 - 16 ký tự!";
    }

    // re mat_khau
    if (strlen($re_mat_khau) == 0) {
        $errors['re_mat_khau'] = "Vui lòng nhập lại mật khẩu!";
    } else if ($re_mat_khau != $mat_khau) {
        $errors['re_mat_khau'] = "Mật khẩu không khớp!";
    }

    // ho ten
    if (strlen($ho_ten) == 0) {
        $errors['ho_ten'] = "Vui lòng nhập họ tên!";
    } else if (strlen($ho_ten) > 30 || strlen($ho_ten) < 6) {
        $errors['ho_ten'] = "Họ tên phải 6 - 30 ký tự!";
    }

    // sdt
    $phoneNumberPattern = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
    if (strlen($sdt) == 0) {
        $errors['sdt'] = "Vui lòng nhập số điện thoại!";
    } else if (!preg_match($phoneNumberPattern, $sdt)) {
        $errors['sdt'] = "Số điện thoại không hợp lệ!";
    }

    // email
    if (strlen($email) == 0) {
        $errors['email'] = "Vui lòng nhập Email!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email chưa đúng định dạng!";
    }

    if (!isset($vai_tro)) {
        $errors['vai_tro'] = "Vui lòng chọn vai trò!";
    }
    return $errors;
}

function validateUpdateKH_ad($data, $isPass) {
    extract($data);
    $errors = [];
    
    if (strlen($mat_khau_old) == 0) {
        $errors['mat_khau_old'] = "Vui lòng nhập mật khẩu cũ!";
    }
    else if ($isPass != $mat_khau_old) {
        $errors['mat_khau_old'] = "Mật khẩu cũ không đúng!";
    }
    // mat_khau
    if (strlen($mat_khau) == 0) {
        $errors['mat_khau'] = "Vui lòng nhập mật khẩu mới!";
    } else if (strlen($mat_khau) > 16 || strlen($mat_khau) < 6) {
        $errors['mat_khau'] = "Mật khẩu phải 6 - 16 ký tự!";
    }

    // re mat_khau
    if (strlen($re_mat_khau) == 0) {
        $errors['re_mat_khau'] = "Vui lòng nhập lại mật khẩu mới!";
    } else if ($re_mat_khau != $mat_khau) {
        $errors['re_mat_khau'] = "Mật khẩu không khớp!";
    }

    // ho ten
    if (strlen($ho_ten) == 0) {
        $errors['ho_ten'] = "Vui lòng nhập họ tên!";
    } else if (strlen($ho_ten) > 30 || strlen($ho_ten) < 6) {
        $errors['ho_ten'] = "Họ tên phải 6 - 30 ký tự!";
    }

    // sdt
    $phoneNumberPattern = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
    if (strlen($sdt) == 0) {
        $errors['sdt'] = "Vui lòng nhập số điện thoại!";
    } else if (!preg_match($phoneNumberPattern, $sdt)) {
        $errors['sdt'] = "Số điện thoại không hợp lệ!";
    }

    // email
    if (strlen($email) == 0) {
        $errors['email'] = "Vui lòng nhập Email!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email chưa đúng định dạng!";
    }

    if (!isset($vai_tro)) {
        $errors['vai_tro'] = "Vui lòng chọn vai trò!";
    }
    return $errors;
}
?>