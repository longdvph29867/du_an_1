<?php
    $dsloai = loai_all();
    foreach ($dsloai as $loai) {
        extract($loai);
        if($hoat_dong_loai != 0) {
    $link = url_site.'/listProduct/?ctl=category&ma_loai='.$loai['ma_loai'];
?>
    <li><a href="<?=$link?>"><?=$ten_loai?></a></li>
<?php
        }
    }
?>
