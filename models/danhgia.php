<?php
function danhgia_insert($arrReview)
{
    $sql = "INSERT INTO `danh_gia` (`noi_dung_danh_gia`, `xep_hang`, `ma_hh`, `ma_kh`) VALUES ";
    $conn = connection();
    foreach($arrReview as $review) {
        $sql = $sql. "('$review[comment]', '$review[rating]', '$review[ma_hh]', '$review[ma_kh]'),";
    };
    $newSQl = substr($sql, 0 , -1);
    echo $newSQl;
    $stmt = $conn->prepare($newSQl);
    $stmt->execute();
}


?>