
<!-- header -->
<header class="py-0 lg:py-4 bg-white z-50">
    <div class="
        header_top 
        container 
        mx-auto 
        flex 
        justify-between 
        items-center
        flex-col
        pt-4
        lg:pt-0
        md:flex-row
        ">
        <a href="<?=url ?>">
            <img class="w-72" src="<?= url_public ?>/assets/images/logo1.png" alt="">
        </a>
        <div class="flex items-center">
            <!-- search -->
            <?php require "search.php" ?>
            <!-- tai khoan -->
            <div>
                <?php
                if (exsist_param("btn_logout")) {
                    session_unset();
                    session_destroy();

                    delete_cookie('info-user');
                    header("location: ".url);
                }
                if (isset($_SESSION['user'])) {
                    $info_user = $_SESSION['user'];
                ?>
                    <div class="user_header ml-2 relative hidden lg:block">
                        <img class="h-12 w-12 object-cover" src="<?=url_public."/images/users/$info_user[hinh]"; ?>" alt="">
                        <ul class="user_child">
                            <li><a href="#">Thông tin</a></li>
                            <?php
                            if ($info_user['vai_tro']) {
                                echo "<li><a href='#'>Quản trị</a></li>";
                            }
                            ?>

                            <li><a href="?btn_logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php
                } else {
                ?>
                <div class="flex">
                    <a href="<?= url_site ?>/login/?ctl=login" class="btn1 text-center mx-2 hidden lg:block">Đăng nhập</a>
                    <a href="<?= url_site ?>/login/" class="btn1 text-center hidden lg:block">Đăng Ký</a>
                </div>
                <?php
                }
                ?>

            </div>

            <!--  -->
            <div class="cart_header relative">
                <a href="<?=url_views . "/site/giohang"?>">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="quantity_cart">16</span>
                </a>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="header_bottom z-50 lg:z-0 ">
        <div class="
            container 
            mx-auto 
            flex 
            justify-between 
            lg:justify-end 
            items-center 
            bg-[#62d2a2]
            lg:bg-white
            lg:mt-0
            
            ">
            <a href="<?=url?>" class="mr-auto hidden lg:block">
                <img class="logo_scroll w-72 hidden lg:block" src="<?=url_public ?>/assets/images/logo1.png" alt="">
            </a>
            <h3 class="lg:hidden text-lg text-white font-semibold py-2 mr-auto">MENU</h3>
            <nav class="hidden lg:flex items-center menu">
                <ul class="flex">
                    <li><a href="<?= url_site ?>/trang-chinh/index.php">Trang chủ</a></li>
                    <li class="menu_item ">
                        <a href="#">Danh mục <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="child_menu">
                            <!-- danh muc header -->
                            <?php require "danh-muc-header.php" ?>
                        </ul>
                    </li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="?ctl=about">Giới thiệu</a></li>
                    <li><a href="?ctl=contact">Liên hệ</a></li>
                </ul>
            </nav>
            <div class="btn_menu_mobile lg:hidden">
                <button class="text-white text-2xl">
                    <i class="fa-solid fa-bars"></i>
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <!--  -->
        <nav class="lg:hidden flex flex-col items-center menu menu_mobile">
            <ul class="flex flex-col w-full text-center">
                <li><a href="index.php">Trang chủ</a></li>
                <!-- show -->
                <li class="menu_item_mobile ">
                    <a id="showMenuChildMobile" href="javascript:void(0);">Danh mục <i class="fa-solid fa-chevron-down"></i></a>
                    <ul class="child_menu_mobile">
                        <!-- danh muc header -->
                        <?php require "danh-muc-header.php" ?>
                    </ul>
                </li>
                <li><a href="#">Sản phẩm</a></li>
                <li><a href="?ctl=about">Giới thiệu</a></li>
                <li><a href="?ctl=contact">Liên hệ</a></li>
                <li class="flex justify-center pb-2 items-center flex-wrap">
                    <!-- tai khoan mobile -->
                        <?php
                        if (exsist_param("btn_logout")) {
                            session_unset();

                            session_destroy();
                            delete_cookie('info-user');
                            header("location: ". url);
                        }

                        if (isset($_SESSION['user'])) {
                        ?>
                            <div class="user_header">
                                <img class="h-12 w-12 object-cover" src="<?=url_public."/images/users/$info_user[hinh]"; ?>" alt="">
                            </div>
                            <a href="#" class="btn2 ml-2">Thông tin</a>
                            <?php
                            if (true) {
                                echo "<a href='#' class='btn2 mx-2 '>Quản lý</a>";
                            }
                            ?>
                            <a href="?btn_logout" class="btn2 ml-1">Đăng xuất</a>
                        <?php
                        } else {
                        ?>
                            <a href="#" class="btn1 mx-2 ">Đăng nhập</a>
                            <a href="#" class="btn1 ">Đăng Ký</a>
                        <?php
                        }
                        ?>
                    <div>
                    </div>
                    <!--  -->
                </li>
            </ul>
        </nav>
        <!--  -->
    </div>
</header>