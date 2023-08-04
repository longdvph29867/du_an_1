

    <!-- banner -->
    <section class="banner">
        <div class="banner_slide">
            <div><img src="<?=url_public?>/assets/images/banner11.jpeg" alt=""></div>
            <div><img src="<?=url_public?>/assets/images/banner12.jpeg" alt=""></div>
            <div><img src="<?=url_public?>/assets/images/banner1.webp" alt=""></div>
            <div><img src="<?=url_public?>/assets/images/banner2.webp" alt=""></div>
            <div><img src="<?=url_public?>/assets/images/banner3.webp" alt=""></div>
            <div><img src="<?=url_public?>/assets/images/banner4.webp" alt=""></div>
            <div><img src="<?=url_public?>/assets/images/banner6.webp" alt=""></div>
        </div>
    </section>

    <!-- categorys -->
    <?php require "danh-muc-home.php"?>

    <!-- banner 2 -->
    <section class="pt-6">
        <div class="filter brightness-90">
            <img src="<?=url_public?>/assets/images/banner14.webp" alt="">
        </div>
    </section>
    <!-- top products -->
    <?php require "top-10-home.php"?>


    <!-- our product -->
    <?php require "san-pham-dac-biet.php"?>

    <!-- banner 3 -->
    <div class="py-8">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div>
                    <img class="object-cover" src="<?=url_public?>/assets/images/fruit1.jpeg" alt="">
                </div>
                <div>
                    <img class="object-cover" src="<?=url_public?>/assets/images/fruit2.jpeg" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- blog -->
    <section class="blogs py-8">
        <div class="container mx-auto">
            <div class="title">
                <h2>Tin tức nổi bật</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 text-white">

                <div class="grid grid-cols-1 lg:grid-cols-2 items-center bg-[#fa8383] cursor-pointer min-h-[280px]">
                    <img 
                    class="filter hover:brightness-50 duration-300 object-cover h-full w-full"
                    src="<?=url_public?>/assets/images/friedsquid.webp" alt="">
                    <div class="p-6">
                        <p class="text-white opacity-80 text-sm italic">
                            <i class="fa-solid fa-calendar-days"></i>
                            02/06/2023
                        </p>
                        <h3 class="text-lg py-2.5 capitalize font-semibold hover:text-[#62d2a2] duration-300">
                            Cách làm mực ống chiên giòn
                        </h3>
                        <p class="text-[15px] text-white ">
                            Mực ống chiên giòn - một trong món ăn quen thuộc tại các thực đơn ăn uống ở nhà hàng Việt lâu nay. 
                            Với hương vị thơm ngon, hấp dẫn, độ giòn ngoài mềm...
                        </p>
                        <a href="#" class="flex items-center mt-4 hover:text-[#8ec8af] duration-300">
                            <div class="h-[1px] w-6 bg-white mr-4"></div>
                            <span>Đọc thêm</span>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 items-center bg-[#4aa193] cursor-pointer  min-h-[280px]">
                    <img 
                    class="filter hover:brightness-50 duration-300 object-cover h-full w-full"
                    src="<?=url_public?>/assets/images/bao-quan-hoa-qua.jpeg" alt="">
                    <div class="p-6">
                        <p class="text-white opacity-80 text-sm italic">
                            <i class="fa-solid fa-calendar-days"></i>
                            01/06/2023
                        </p>
                        <h3 class="text-lg py-2.5 capitalize font-semibold hover:text-[#62d2a2] duration-300">
                            Cách bảo quản rau trong tủ lạnh được lâu
                        </h3>
                        <p class="text-[15px] text-white ">
                            Cách bảo quản rau trong tủ lạnh được lâu là tuyệt đối không nên rửa rau củ trước khi cho vào 
                            tủ lạnh vì độ ẩm lớn quá nhiều khiến rau dễ bị biến màu, hư hỏng...
                        </p>
                        <a href="#" class="flex items-center mt-4 hover:text-[#62d2a2] duration-300">
                            <div class="h-[1px] w-6 bg-white mr-4"></div>
                            <span>Đọc thêm</span>
                        </a>
                    </div>
                </div>

                
            </div>
        </div>
    </section>

    <!-- partner -->
    <section class="py-8">
        <div class="container mx-auto">
            <div class="title">
                <h2>Đối tác của chúng tôi</h2>
            </div>
            <div class="grid grid-cols-5 gap-16">
                <div>
                    <img src="<?=url_public?>/assets/images/partner-grap.webp" alt="">
                </div>
                <div>
                    <img src="<?=url_public?>/assets/images/partner-shopee.webp" alt="">
                </div>
                <div>
                    <img src="<?=url_public?>/assets/images/partner-aeon.webp" alt="">
                </div>
                <div>
                    <img src="<?=url_public?>/assets/images/partner-vinmart.webp" alt="">
                </div>
                <div>
                    <img src="<?=url_public?>/assets/images/partner-tiki.webp" alt="">
                </div>
            </div>
        </div>
    </section>
