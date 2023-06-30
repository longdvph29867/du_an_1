<?php
// top 10 hàng hoá
function hanghoa_top_10()
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa ORDER BY so_luot_xem DESC LIMIT 10";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>