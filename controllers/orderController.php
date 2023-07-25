<?php
function order() {
    $ma_kh = $_SESSION['user']['ma_kh'];
    $listVanChuyen = vanchuyen_all();
    $listProduct = [];
    
    foreach($_POST['ma_gh'] as $item) {
        $listProduct[] = giohang_by_id($item);
    };
    $data = [
        'ma_kh' => $ma_kh,
        'ten_nguoi_nhan' => $_SESSION['user']['ho_ten'],
        'sdt' => $_SESSION['user']['sdt'],
        'listProduct' => $listProduct,
    ];

    // echo "<pre>";
    // print_r($data);
    $view_name = "order.php";
    view('layout/layout', ['view_name' => $view_name, 'data' => $data, 'listVanChuyen' => $listVanChuyen]);
}

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

function order_da_nhan_hang() {
    $ma_dh = $_GET['ma_dh'];
    donhang_update_da_nhan_hang($ma_dh);
    header("location: ?ctl=order-list");
    die;
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

function order_insert() {
    $errors = validateAddOrder($_POST);

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    global $TODAY;
    $ma_kh = $_SESSION['user']['ma_kh'];
    $products = [];
    foreach($_POST['ma_cthh'] as $key => $value) {
        $products[] = [
            'ma_cthh' => $key,
            'so_luong' => $value,
        ];
    };

    if(empty($errors)) {
        $data = [
            'ma_kh' => $ma_kh,
            'ngay_dat' => $TODAY,
            'ten_nguoi_nhan' => $_POST['ten_nguoi_nhan'],
            'sdt_nguoi_nhan' => $_POST['sdt'],
            'dia_chi_nhan' => $_POST['dia_chi_nhan'],
            'tong_tien' => $_POST['thanh_toan'],
            'ma_van_chuyen' => $_POST['ma_van_chuyen'],
            'ghi_chu' => $_POST['ghi_chu'],
            'products' => $products,
        ];
        $new_ma_dh = donhang_insert($data);
        donhang_chitiet_insert($new_ma_dh, $products);
        gh_delete_all();
        header("location: ?ctl=order-list");
        die;
    }
    else {
        $listVanChuyen = vanchuyen_all();
        $listProduct = [];
        
        foreach($_POST['ma_gh'] as $item) {
            $listProduct[] = giohang_by_id($item);
        };
        $data = [
            'ma_kh' => $ma_kh,
            'ten_nguoi_nhan' => $_SESSION['user']['ho_ten'],
            'sdt' => $_SESSION['user']['sdt'],
            'listProduct' => $listProduct,
        ];

        // echo "<pre>";
        // print_r($errors);
        // echo "</pre>";

        $view_name = "order.php";
        view('layout/layout', ['view_name' => $view_name, 'data' => $data, 'listVanChuyen' => $listVanChuyen], $errors, $_POST);
    }

}

?>