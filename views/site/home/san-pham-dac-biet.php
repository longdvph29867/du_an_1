<section class="our_products py-8 bg-[#f3f6f5]">
    <div class="container mx-auto">
        <div class="title">
            <h2>Sản Phẩm đặc biệt của chúng tôi</h2>
        </div>
<?php
    // echo "<pre>";
    // print_r($dac_biet);
    // echo "</pre>";

?>
        <div class="listProduct_carousel">
            <?php
            $stt = 0;
            foreach ($dac_biet as $item) {
                if (isset($_SESSION['user'])) {
                    $ma_kh = $_SESSION['user']['ma_kh'];
                } else {
                    $ma_kh = false;
                }
                $stt += 1;
                $chitiet_dongia = reset($item['chi_tiet_sp']);
                $link = url_site . "/chitiet/?ma_hh=" . $item['ma_hh'];

                // $link = "#";
            ?>
            <div class="p-3">
                <div class="product_item">
                    <div class="product_img relative">
                        <img src="<?= url_public ?>/images/products/<?= reset($item['hinhArr']) ?>" alt="">
                        <div class="overlay absolute w-full h-full bg-white/50 top-0 left-0 flex items-center justify-center">
                            <div class="flex space-x-2">
                                <a href="<?= $link ?>" class="btn2 min-w-[40px] w-11 h-11 flex items-center justify-center"><i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" <?php
                                if ($ma_kh) {
                                ?> onclick="addCartItem('<?= $ma_kh ?>',<?= $chitiet_dongia['ma_cthh'] ?>, 1, <?= $chitiet_dongia['so_luong'] ?>)" ; <?php
                                } else {
                                    ?> onclick="showMesssage(false, 'Vui lòng đăng nhập!')" ; <?php
                                }
                                ?> class="btn2 min-w-[40px] w-11 h-11 flex items-center justify-center"><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product_content">
                        <a href="<?= $link ?>">
                            <h3><?= $item['ten_hh'] ?></h3>
                        </a>
                        <hr>
                        <p><span><?= number_format($chitiet_dongia['don_gia'] - $chitiet_dongia['giam_gia'], 0, ',', '.') ?> đ</span>/<?= $chitiet_dongia['don_vi'] ?></p>
                        <div class="min-h-[24px]">
                            <?php
                            if ($chitiet_dongia['giam_gia'] > 0) {
                            ?>
                                <div><span class="line-through text-gray-400"><?= number_format($chitiet_dongia['don_gia'], 0, ',', '.') ?> đ/<?= $chitiet_dongia['don_vi'] ?></span> -<?= ceil(discountPrecent($chitiet_dongia['don_gia'], $chitiet_dongia['giam_gia'])) ?>%</div>
                            <?php

                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>


    </div>
</section>