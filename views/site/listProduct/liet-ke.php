<div class="flex items-center justify-between">
    <h3 class="text-2xl mb-4"><?= $productsTotal ?> Sản phẩm</h3>
    <form action="" method="GET" id="filter">
        <input type="text" name="ctl" value="<?=$_GET['ctl']?>" class='hidden'>
        <?php
        if(isset($_GET['keywords'])) {
            echo "<input type='text' name='keywords' value='$_GET[keywords]' class='hidden'>";
        }
        else if (isset($_GET['ma_loai'])) {
            echo "<input type='text' name='ma_loai' value='$_GET[ma_loai]' class='hidden'>";

        };
        ?> 
        <select onchange="submitFormFilter ()" name="filter" class="px-2 py-1 border min-w-[180px] rounded mr-[2px] outline-none" >
            <option value="" hidden>---Lọc--</option>
            <option <?php if(isset($_GET['filter']) && $_GET['filter'] == 'all') echo 'selected';?>  value="all">Tât cả</option>
            <option <?php if(isset($_GET['filter']) && $_GET['filter'] == 'hot') echo 'selected';?>  value="hot">Mức độ phổ biến</option>
            <option <?php if(isset($_GET['filter']) && $_GET['filter'] == 'rating') echo 'selected';?>  value="rating">Theo điểm đánh giá</option>
            <option <?php if(isset($_GET['filter']) && $_GET['filter'] == 'new') echo 'selected';?>  value="new">Mới nhất</option>
            <option <?php if(isset($_GET['filter']) && $_GET['filter'] == 'low-to-high') echo 'selected';?>  value="low-to-high">Thấp đến cao</option>
            <option <?php if(isset($_GET['filter']) && $_GET['filter'] == 'high-to-low') echo 'selected';?>  value="high-to-low">Cao xuống thấp</option>
        </select>
    </form>

</div>
<div class="grid gap-7 md:grid-cols-3 sm:grid-cols-2 grid-cols-1">

    <?php
    foreach ($items as $item) {
        if(isset($_SESSION['user'])) {
            $ma_kh = $_SESSION['user']['ma_kh'];
        }
        else {
            $ma_kh = false;
        }
        // $item = reset($item['chi_tiet_sp']);
        $link = url_site . "/chitiet/?ma_hh=" . $item['ma_hh'];

    ?>
        <div class="product_item">
            <div class="product_img relative">
                <img src="<?= url_public?>/images/products/<?= $item['ten_hinh'] ?>" alt="">
                <div class="overlay absolute w-full h-full bg-white/50 top-0 left-0 flex items-center justify-center">
                    <div class="flex space-x-2">
                        <a href="<?= $link ?>" class="btn2 !min-w-[40px] w-11 h-11 flex items-center justify-center"><i class="fa-solid fa-eye"></i></a>
                        <a href="javascript:void(0);" 
                        <?php
                            if($ma_kh) {
                        ?>
                                onclick= "addCartItem('<?=$ma_kh?>',<?=$item['ma_cthh']?>, 1, <?= $item['so_luong'] ?>)";
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
                <p><span class="lowercase"><?= number_format($item['don_gia'] - $item['giam_gia']) ?> đ</span>/<?=$item['don_vi']?></p>
                <?php
                if ($item['giam_gia'] > 0) {
                ?>
                    <div><span class="line-through text-gray-400"><?= number_format($item['don_gia']) ?></span> -<?= ceil(discountPrecent($item['don_gia'], $item['giam_gia'])) ?>%</div>
                <?php

                }
                ?>
            </div>
            <p class="view"><span>Đã xem </span><?= $item['so_luot_xem'] ?></p>
            <div id="item-rating" class="absolute left-1.5 bottom-1.5 h-[24px]">
                <!-- (<?=$item['rating']?>) -->
                <i data-star="<?=$item['rating']?>"></i>
                <!-- <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>
                <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>
                <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>
                <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>
                <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button> -->
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
            $thisURL = $_SERVER['REQUEST_URI'];
            $params = explode('&page', $thisURL);
            // echo $thisURL;
            // echo '<pre>';
            // print_r($params);
            // echo '</pre>';
            for($i = 0; $i < $pageTotal; $i++) {
            ?>
                <a class="<?php 
                    if(!isset($_GET['page']) && $i == 0) {
                        echo 'btn_page';
                    };
                    if((isset($_GET['page']) && $_GET['page']==$i+1)) {
                        echo 'btn_page';
                    }
                ?> hidden md:flex w-10 h-10 mx-1 justify-center items-center rounded-full border border-[#62d2a2] text-[#62d2a2] hover:bg-[#62d2a2] hover:text-white" href="<?=$params[0]?>&page=<?=$i+1?>">
                <?=$i+1?>
                </a>
            <?php
            }
        }
    ?>

  </nav>
</div>
</div>