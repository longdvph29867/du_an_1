<?php
//Truy vấn tất cả vc
function vanchuyen_all()
{
    $conn = connection();
    $sql = "SELECT * FROM don_vi_van_chuyen";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

