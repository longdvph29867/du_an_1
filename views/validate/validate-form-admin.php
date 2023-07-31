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

function validateFiles($hinh) {
    $errors = [];
    $typeImg = ['png', 'jpg', 'jpeg', 'webp'];
    if (strlen($_FILES[$hinh]['name'][0]) == 0) {
        $errors['hinh'] = 'Vui lòng chọn file!';
    } 
    else if (count($_FILES[$hinh]['name']) > 5) {
        $errors['hinh'] = 'Tối đa 5 file!';
    }
    else {
        for($i = 0; $i < count($_FILES[$hinh]['name']); $i++) {
            $typeFile = pathinfo($_FILES[$hinh]['name'][$i], PATHINFO_EXTENSION);
            if(!in_array(strtolower($typeFile), $typeImg)){
                $errors['hinh'] = 'File phải có định dạng là png, jpg, jpeg, webp!';
            }
            else if($_FILES[$hinh]['size'][$i] > (2 * 1024 * 1024)) {
                $errors['hinh'] = 'Kích thước không quá 2 MB!';
            }
            else if(strlen($_FILES[$hinh]['name'][$i]) > 46) {
                $errors['hinh'] = 'Tên file quá dài!';
            }
        }
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

function validateInsertThuocTinh($data) {
    $errors = [];
    extract($data);
    if (strlen($don_vi) == 0) {
        $errors['don_vi'] = "Vui lòng nhập trường này!";
    }

    if (strlen($don_gia) == 0) {
        $errors['don_gia'] = "Vui lòng nhập trường này!";
    } else if ($don_gia < 1) {
        $errors['don_gia'] = "Đơn giá phải lớn hơn 0!";
    }

    if (strlen($giam_gia) == 0) {
        $errors['giam_gia'] = "Vui lòng nhập trường này!";
    } else if ($giam_gia < 0) {
        $errors['giam_gia'] = "Giảm giá không nhỏ hon 0!";
    }

    if (strlen($so_luong) == 0) {
        $errors['so_luong'] = "Vui lòng nhập trường này!";
    } else if ($so_luong < 1) {
        $errors['so_luong'] = "Số lượng phải lớn hơn 0!";
    }
    
    return $errors;
}

function validateUpdateThongTin($data) {
    $errors = [];
    extract($data);
    if (strlen($ten_hh) == 0) {
        $errors['ten_hh'] = "Vui lòng nhập trường này!";
    }

    if (!isset($dac_biet)) {
        $errors['dac_biet'] = "Vui lòng nhập trường này!";
    }

    if (strlen($ma_loai) == 0) {
        $errors['ma_loai'] = "Vui lòng nhập trường này!";
    }

    if (strlen($mo_ta) == 0) {
        $errors['mo_ta'] = "Vui lòng nhập trường này!";
    }
    
    return $errors;
}

function validateInsertHH($data) {
    $errors = [];
    extract($data);
    if (strlen($ten_hh) == 0) {
        $errors['ten_hh'] = "Vui lòng nhập trường này!";
    }

    if (!isset($dac_biet)) {
        $errors['dac_biet'] = "Vui lòng nhập trường này!";
    }

    if (strlen($ma_loai) == 0) {
        $errors['ma_loai'] = "Vui lòng nhập trường này!";
    }

    if (strlen($mo_ta) == 0) {
        $errors['mo_ta'] = "Vui lòng nhập trường này!";
    }
    
    for($i = 0; $i < count($don_vi); $i++) {
        if (strlen($don_vi[$i]) == 0) {
            $errors['thuoc_tinh'] = "Vui lòng nhập đầy đủ thuộc tính!";
        }

        if (strlen($don_gia[$i]) == 0) {
            $errors['thuoc_tinh'] = "Vui lòng nhập trường này!";
        }
        else if ($don_gia[$i] < 1) {
            $errors['thuoc_tinh'] = "Đơn giá phải lớn hơn 0!";
        }

        if (strlen($giam_gia[$i]) == 0) {
            $errors['thuoc_tinh'] = "Vui lòng nhập trường này!";
        }
        else if ($giam_gia[$i] < 0) {
            $errors['thuoc_tinh'] = "Giảm giá không nhỏ hon 0!";
        }


        if (strlen($so_luong[$i]) == 0) {
            $errors['thuoc_tinh'] = "Vui lòng nhập đủ thuộc tính!";
        }
        else if ($so_luong[$i] < 1) {
            $errors['thuoc_tinh'] = "Số lượng phải lớn hơn 0!";
        }

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