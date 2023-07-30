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
?>