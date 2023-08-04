<!--  -->
<section class="flex items-center justify-center
    bg-[url('<?=url_public?>/assets/images/breadcrumb-banner.webp')]
    bg-cover
    border-t-2
    border-gray-300
    ">
        <div class="text-center py-9">
            <h2 class="pb-5 text-4xl">Cửa hàng</h2>
            <p>Trang chủ /  <?php if(isset($name_page)) echo $name_page;?></p>
        </div>
    </section>

    <!--  -->
    <section class="text-[#333] capitalize py-16">
        <div class="container mx-auto">
            <div class="flex mx-[-16px] flex-col-reverse lg:flex-row">
                <div class="w-full lg:w-1/4 px-4 mt-8 lg:mt-0">
                    <div class="flex mx-[-16px] flex-col lg:flex-col sm:flex-row">
                        <!-- category -->
                        <?php require "danh-muc-content.php" ?>

                        <!-- top products -->
                        <?php require "top-10-content.php" ?>
                        
                    </div>
                </div>
                <div class="w-full lg:w-3/4 px-4">
                    <?php require $content; ?>
                    
                </div>

            </div>
        </div>
    </section>