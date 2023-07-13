<?php 
function giohang_by_ma_kh($ma_kh) {
    $data = [$ma_kh];
    $conn = connection();
    $sql = "SELECT hang_hoa.hinh, hang_hoa.ten_hh, (hang_hoa.don_gia-hang_hoa.giam_gia) as 'don_gia', gio_hang.so_luong, gio_hang.ma_gh FROM `gio_hang` INNER JOIN hang_hoa on hang_hoa.ma_hh = gio_hang.ma_hh WHERE gio_hang.ma_kh = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
/**
 * thêm loại hàng
 * @param $data mảng chưa dữ liệu loại có key và value
 * Ví dụ: $data=['ten_loai'=>'Máy tính Dell']
 */
function giohang_insert($ma_gh)
{
    $data = [$ma_gh];
    $conn = connection();
    $sql = "Insert Into gio_hang(ma_gh) Values(?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
/**
 * cập nhật loại hàng theo ma_loai
 * @param $data mảng chưa dữ liệu cập nhật có key và value
 * Ví dụ: $data=['ten_loai'=>'Máy tính Dell']
 * * @param $ma_loai cần cập nhật
 */
function gh_update($ma_gh, $ma_kh, $ma_hh)
{
    $arr = func_get_args();
    $conn = connection();
    $sql = "UPDATE gio_hang SET ma_gh=? WHERE ma_gh=?";

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
}
/**
 * Xóa loại hàng
 * @param $ma_loai cần xóa
 */
function gh_delete($ma_gh)
{
    $data = func_get_args();
    $conn = connection();
    $sql = "DELETE FROM gio_hang WHERE ma_gh=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
//Lấy ra 1 loại hàng
function gh_select_by_id($ma_gh)
{
    $data[] = $ma_gh;
    $conn = connection();
    $sql = "SELECT * FROM gio_hang WHERE ma_gh=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    $loai = $stmt->fetch(PDO::FETCH_ASSOC);
    return $loai;
}

?>