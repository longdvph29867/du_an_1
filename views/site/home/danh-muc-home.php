<section class="categorys">
    <div class="container mx-auto">
        <div class="title">
            <h2>Danh mục</h2>
        </div>
        <div class="categorys_carousel">
            <?php
            foreach ($list_loai as $loai) {
                if($loai['hoat_dong_loai'] == 0) {
                    continue;
                }
                ?>
                <div class="px-3">
                    <a href="<?=url_site.'/listProduct/?ctl=category&ma_loai='.$loai['ma_loai']?>">
                        <div class="flex flex-col items-center cursor-pointer ">
                            <img src="<?= url_public . '/images/category/' . $loai['hinh_loai'] ?>" alt="">
                            <h4 class="pt-2"><?=$loai['ten_loai']?></h4>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
