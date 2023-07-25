<?php
function ad_loai_list() {
    $listLoai = loai_all();
    $view_name = "list.php";
    view('layout/layout-admin', ['view_name' => $view_name, 'listLoai' => $listLoai]);
}
?>