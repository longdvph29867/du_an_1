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

    if (strlen($dac_biet) == 0) {
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

    if (empty($dac_biet)) {
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
?>