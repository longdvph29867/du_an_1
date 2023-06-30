<!--  -->
<section class="mt-[178px] md:mt-[130px] lg:mt-[142px] flex items-center justify-center
    bg-[url('<?=$url_content?>/image-layout/breadcrumb-banner.webp')]
    bg-cover
    border-t-2
    border-gray-300
    ">
        <div class="text-center py-9">
            <h2 class="pb-5 font-['Berkshire_Swash'] text-4xl">Cửa hàng</h2>
            <p>Trang chủ / <?=$MESSAGE?></p>
        </div>
    </section>

    <!--  -->
    <section class="text-[#333] capitalize py-16">
        <div class="container mx-auto">
            <div class="flex mx-[-16px] flex-col-reverse lg:flex-row">
                <div class="w-full lg:w-1/4 px-4 mt-8 lg:mt-0">
                    <div class="flex mx-[-16px] flex-col lg:flex-col sm:flex-row">
                        <!-- category -->
                        <?php require "items-content/danh-muc-layout2.php" ?>

                        <!-- top products -->
                        <?php require "items-content/top-10-layout2.php" ?>
                        
                    </div>
                </div>
                <div class="w-full lg:w-3/4 px-4">
                    <?php require $list; ?>
                    
                </div>

            </div>
        </div>
    </section>