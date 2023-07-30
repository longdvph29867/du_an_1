<?php
function danhgia_insert($arrReview)
{
    $sql = "INSERT INTO `danh_gia` (`noi_dung_danh_gia`, `xep_hang`, `ma_hh`, `ma_kh`) VALUES ";
    $conn = connection();
    foreach($arrReview as $review) {
        $sql = $sql. "('$review[comment]', '$review[rating]', '$review[ma_hh]', '$review[ma_kh]'),";
    };
    $newSQl = substr($sql, 0 , -1);
    $stmt = $conn->prepare($newSQl);
    $stmt->execute();
}

function danhgia_by_mahh($ma_hh)
{
    $conn = connection();
    $sql = "SELECT * FROM danh_gia 
	INNER JOIN khach_hang ON danh_gia.ma_kh = khach_hang.ma_kh
    WHERE ma_hh = $ma_hh";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


?>