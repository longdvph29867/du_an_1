<?php
require_once '../config.php';
require_once '../models/connection.php';
connection();
$ma_gh= $_GET['ma_gh'];
function tang_SL($ma_gh, $thay_doi)
{
    $conn = connection();
    $sql = "UPDATE `gio_hang` SET `so_luong` = (so_luong + $thay_doi) WHERE `gio_hang`.`ma_gh` = $ma_gh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function get_SL($ma_gh)
{
    $conn = connection();
    $sql = "SELECT so_luong FROM `gio_hang` WHERE ma_gh = $ma_gh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
if($_GET['number']) {
    $thay_doi = $_GET['number'];
    tang_SL($ma_gh, $thay_doi);
}

print_r(get_SL($ma_gh));
?>