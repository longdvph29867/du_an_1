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


// các sản phẩm đặc biệt
function hanghoa_dac_biet()
{
    $conn = connection();
    $sql = "SELECT * FROM hang_hoa JOIN don_vi ON don_vi.ma_dv = hang_hoa.ma_dv WHERE hang_hoa.dac_biet = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>