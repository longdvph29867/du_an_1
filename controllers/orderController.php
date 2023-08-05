<?php
function order() {
    $ma_kh = $_SESSION['user']['ma_kh'];
    $listVanChuyen = vanchuyen_all();
    $listProduct = giohang_by_ma_kh($ma_kh);
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
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

    $name_page = "Danh sách đơn hàng";
    $content = "order_list.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orders' => $orders, 'name_page' => $name_page]);
}

function order_detail() {
    $id = $_GET['ma_dh'] ?? '';
    $orderDetail =  donhang_by_id($id);

    $name_page = "Chi tiết đơn hàng";
    $content = "order_detail.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orderDetail' => $orderDetail, 'name_page' => $name_page]);
}

function order_cancel()
{
    $ma_dh = $_GET['ma_dh'];
    $detailDonHang = donhang_by_id($ma_dh);
    hanghoa_update_so_luong($detailDonHang['products'], true);
    donhang_cancel_by_id($ma_dh);
    addMesssage(true, "Đã huỷ đơn hàng");
    header("location: ?ctl=order-list");
    die;
}

function order_review() {
    $id = $_GET['ma_dh'] ?? '';
    $orderDetail =  donhang_by_id($id);

    $name_page = "Đánh giá đơn hàng";
    $content = "order_review.php";
    $view_name = "../../layout/content-layout/content-layout.php";
    view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orderDetail' => $orderDetail, 'name_page' => $name_page]);
}

function order_da_nhan_hang() {
    $ma_dh = $_GET['ma_dh'];
    donhang_update_da_nhan_hang($ma_dh);
    addMesssage(true, "Cảm ơn bạn đã mua hàng");
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
        addMesssage(true, "Đánh giá thành công");
        header("location: ?ctl=order-list");
        die;
    }
    else {
        $orderDetail =  donhang_by_id($id);

        $name_page = "Đánh giá đơn hàng";
        $content = "order_review.php";
        $view_name = "../../layout/content-layout/content-layout.php";
        view('layout/layout', ['view_name' => $view_name, 'content' => $content, 'orderDetail' => $orderDetail, 'name_page' => $name_page], $errors, $_POST);
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
        gh_delete_all_by_ma_kh($ma_kh);
        hanghoa_update_so_luong($products, false);

        addMesssage(true, "Đặt hàng thành công");
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

        $view_name = "order.php";
        view('layout/layout', ['view_name' => $view_name, 'data' => $data, 'listVanChuyen' => $listVanChuyen], $errors, $_POST);
    }

}

?>