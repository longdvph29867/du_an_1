<h3 class="text-2xl mb-4"><?= count($items) ?> Sản phẩm</h3>
<div class="grid gap-7 md:grid-cols-3 sm:grid-cols-2 grid-cols-1">

    <?php
    foreach ($items as $item) {
        if(isset($_SESSION['user'])) {
            $ma_kh = $_SESSION['user']['ma_kh'];
        }
        else {
            $ma_kh = false;
        }
        $chitiet_dongia = reset($item['chi_tiet_sp']);
        $link = url_site . "/chitiet/?ma_hh=" . $item['ma_hh'];

    ?>
        <div class="product_item">
            <div class="product_img relative">
                <img src="<?= url_public?>/images/products/<?= reset($item['hinhArr']) ?>" alt="">
                <div class="overlay absolute w-full h-full bg-white/50 top-0 left-0 flex items-center justify-center">
                    <div class="flex space-x-2">
                        <a href="<?= $link ?>" class="btn2 !min-w-[40px] w-11 h-11 flex items-center justify-center"><i class="fa-solid fa-eye"></i></a>
                        <a href="javascript:void(0);" 
                        <?php
                            if($ma_kh) {
                        ?>
                                onclick= "addCartItem('<?=$ma_kh?>',<?=$chitiet_dongia['ma_cthh']?>, 1)";
                        <?php
                            }
                            else {
                        ?>
                            onclick = "alert('Vui lòng đăng nhập!')";
                        <?php
                            }
                        ?>
                        class="btn2 !min-w-[40px] w-11 h-11 flex items-center justify-center"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
            <div class="product_content">
                <a href="<?= $link ?>">
                    <h3><?= $item['ten_hh'] ?></h3>
                </a>
                <hr>
                <p><span class="lowercase"><?= number_format($chitiet_dongia['don_gia'] - $chitiet_dongia['giam_gia']) ?> đ</span>/<?=$chitiet_dongia['don_vi']?></p>
                <?php
                if ($chitiet_dongia['giam_gia'] > 0) {
                ?>
                    <div><span class="line-through text-gray-400"><?= number_format($chitiet_dongia['don_gia']) ?></span> -<?= ceil(discountPrecent($chitiet_dongia['don_gia'], $chitiet_dongia['giam_gia'])) ?>%</div>
                <?php

                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>

</div>
<div>
<div class="container mx-auto px-4">
  <nav class="flex flex-row flex-nowrap justify-between md:justify-center items-center" aria-label="Pagination">

    <?php
        if($pageTotal != 1) {
            for($i = 0; $i < $pageTotal; $i++) {
            ?>
                <a class="<?php 
                    if(!isset($_GET['page']) && $i == 0) {
                        echo 'btn_page';
                    };
                    if((isset($_GET['page']) && $_GET['page']==$i+1)) {
                        echo 'btn_page';
                    }
                ?> hidden md:flex w-10 h-10 mx-1 justify-center items-center rounded-full border border-[#62d2a2] text-[#62d2a2] hover:bg-[#62d2a2] hover:text-white" href="?ctl=products&page=<?=$i+1?>">
                <?=$i+1?>
                </a>
            <?php
            }
        }
    ?>

  </nav>
</div>
</div>