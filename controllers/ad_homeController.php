<?php
function ad_home_page() {
    global $danh_sach_thang;
    if(isset($_GET['filter']) && $_GET['filter'] != 'all') {
        $tongDonHang = donhang_total($_GET['filter']);
        $tongDoanhSo = donhang_total_doanhso($_GET['filter']);
        $tongDanhGia = donhang_total_danhgia($_GET['filter']);
        $tongBinhLuan = donhang_comment($_GET['filter']);
    }
    else {
        $tongDonHang = donhang_total();
        $tongDoanhSo = donhang_total_doanhso();
        $tongDanhGia = donhang_total_danhgia();
        $tongBinhLuan = donhang_comment();
    }
    $doanhThu6Thang = donhang_doanhthu_6thang();
    $loai_thongke_sp = loai_thongke_sp();

    // echo '<pre>';
    // print_r($loai_thongke_sp);
    // echo '</pre>';
    // echo $tongDoanhSo;
    $view_name = "home/home.php";
    view('layout/layout-admin', [
        'view_name' => $view_name, 
        'tongDonHang' => $tongDonHang, 
        'tongDoanhSo' => $tongDoanhSo,
        'tongDanhGia' => $tongDanhGia,
        'tongBinhLuan' => $tongBinhLuan,
        'doanhThu6Thang' => $doanhThu6Thang,
        'loai_thongke_sp' => $loai_thongke_sp,
        'danh_sach_thang' => $danh_sach_thang,
    ]);
}
?>