<?php
    $dsloai = loai_all();
    foreach ($dsloai as $loai) {
        extract($loai);
    // $link = '../hang-hoa/liet-ke.php?ma_loai='.$loai['ma_loai'];
    $link = "#$ma_loai";
?>
    <li><a href="<?=$link?>"><?=$ten_loai?></a></li>
<?php
    }
?>
