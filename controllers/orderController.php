<?php

function order_list() {
    $ma_kh = $_SESSION['user']['ma_kh'];
    $orders = donhang_by_kh_all($ma_kh);
    $content = "order_list.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orders' => $orders]);
}

function order_detail() {
    $id = $_GET['ma_dh'] ?? '';
    $orderDetail =  donhang_by_id($id);
    $content = "order_detail.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orderDetail' => $orderDetail]);
}

function order_cancel()
{
    $ma_dh = $_GET['ma_dh'];
    donhang_cancel_by_id($ma_dh);
    header("location: ?ctl=order-list");
    die;
}

function order_review() {
    $id = $_GET['ma_dh'] ?? '';
    $orderDetail =  donhang_by_id($id);
    $content = "order_review.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orderDetail' => $orderDetail]);
}

function order_review_insert()
{
    $errors = validateReview();

    $id = $_GET['ma_dh'];
    $errors = validateReview();
    if(empty($errors)) {
        $arrReview = [];
        foreach ($_POST['rating'] as $key => $value) {
            array_push($arrReview, [
                'ma_hh' => $key,
                'rating' => $value,
                'comment' => $_POST['comment'][$key],
                'ma_kh' => $_SESSION['user']['ma_kh']
            ]);
        };
    
        danhgia_insert($arrReview);
        donhang_update_review($id);
        header("location: ?ctl=order-list");
        die;
    }
    else {
        $orderDetail =  donhang_by_id($id);
        $content = "order_review.php";
        $view_name = "../../layout/content-layout/content-layout.php";
        view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orderDetail' => $orderDetail], $errors, $_POST);
    }
}

?>