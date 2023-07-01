<?php
    $top10 = hanghoa_top_10();

?>

<div class="p-4 lg:w-full sm:w-1/2 w-full">
    <h3 class="text-2xl font-['Berkshire_Swash'] mb-4">Sản phẩm nổi bật</h3>
    <ul class="space-y-3">
        <?php
        $stt = 0;
        foreach ($top10 as $item) {
            $stt += 1;
            // $link = url_site . "/hang-hoa/chi-tiet.php?ma_hh=" . $item['ma_hh'];
            $link = "#";
        ?>
            <a href="<?= $link ?>">
                <li class="flex items-center mt-2">
                    <div class="w-20 border-gray-200 rounded overflow-hidden" style="border-width: 1px;">
                        <img src="<?= url_public ?>/images/products/<?= $item['hinh'] ?>" class="min-h-[70px] object-cover" alt="">
                    </div>
                    <div class="pl-5">
                        <h4 class="text-lg"><?= $item['ten_hh'] ?></h4>
                        <div class="w-14 h-[1px] bg-gray-300 my-1"></div>
                        <p class="text-[#62d2a2] font-bold "><?= number_format($item['don_gia'] - $item['giam_gia']) ?> đ/1kg</p>
                        <?php
                        if ($item['giam_gia'] > 0) {
                        ?>
                            <div class="text-sm"><span class="line-through text-gray-400"><?= number_format($item['don_gia']) ?> đ/1kg</span> -<?= ceil(discountPrecent($item['don_gia'], $item['giam_gia'])) ?>%</div>
                        <?php
                        }
                        ?>
                    </div>
                </li>
            </a>
        <?php

        }
        ?>
    </ul>
</div>