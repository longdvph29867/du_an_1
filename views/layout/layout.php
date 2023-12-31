<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= url_public ?>/assets/images/logo-icon.png" type="image/x-icon">
    <title>Food Market</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Lora:wght@500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- slick slide -->
    <link rel="stylesheet" type="text/css" href="<?= url_public ?>/assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?= url_public ?>/assets/css/slick/slick-theme.css" />
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- my css -->
    
    <link rel="stylesheet" href="<?=url_public?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=url_public?>/assets/css/banner.css">
    <link rel="stylesheet" href="<?=url_public?>/assets/css/title.css">
    <link rel="stylesheet" href="<?=url_public?>/assets/css/categorys.css">
    <link rel="stylesheet" href="<?=url_public?>/assets/css/topproducts.css">
    <link rel="stylesheet" href="<?=url_public?>/assets/css/aboutus.css">
    <link rel="stylesheet" href="<?=url_public?>/assets/css/giohang.css">
    <link rel="stylesheet" href="<?=url_public?>/assets/css/mesages.css">
    <style>
        .error {
            font-size: 14px;
            color: red;
        }
        .btn_page { 
            background-color: #62d2a2 !important;
            color: #fff !important;
            font-weight: 700;
        }
    </style>
</head>

<body class="font-['Raleway']">
    <!-- header -->
    <?php require "header/header.php"; ?>

    <div class="lg:h-[137px] md:h-[125px] h-[173px] "></div>
    <!-- trang home -->
    <?php include $view_name; ?>



    <?php require "footer/footer.php"; ?>

    <!--  -->
    <!-- <div class="h-[500px]">
        123
    </div> -->

    <div id="back-to-top" class="fixed bottom-6 right-6 hidden">
        <div class="w-12 h-12 text-white text-2xl bg-[#62d2a2] hover:opacity-70 cursor-pointer rounded-md flex items-center justify-center ">
            <i class="fa-solid fa-chevron-up"></i>
        </div>
    </div>
    <!-- mess -->
    <div id="toast" class="">
        <div id="img">
            <i class="fa-solid fa-circle-check"></i>
            <i class="fa-solid fa-circle-exclamation"></i>
        </div>
        <div id="desc">A notification message..</div>
    </div>
    <!-- cdn axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- header js -->
    <script>
        const menuMobile = document.querySelector('.header_bottom');
        const btnMenuMobile = document.querySelector('.btn_menu_mobile button');
        const menuMobileChild = document.querySelector('.menu_item_mobile');
        const btnMenuMobileChild = document.querySelector('#showMenuChildMobile');
        const headerEl = document.querySelector('header');
        btnMenuMobile.onclick = () => {
            menuMobile.classList.toggle('show_menu_mobile')
        }
        btnMenuMobileChild.onclick = () => {
            menuMobileChild.classList.toggle('show_child_menu')
        }
        window.addEventListener('click', (e) => {
            if (!menuMobile.contains(e.target)) {
                menuMobile.classList.remove('show_menu_mobile')
            }
        })
        window.addEventListener('scroll', () => {
            if (window.scrollY > 80) {
                headerEl.classList.add('scrollHeader')
            } else {
                headerEl.classList.remove('scrollHeader')
            }
        })
    </script>

    <!-- slick banner -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script type="text/javascript" src="<?= url_public ?>/assets/js/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.banner_slide').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                autoplay: true,
                autoplaySpeed: 3000,
            });
            $('.categorys_carousel').slick({
                infinite: true,
                slidesToShow: 6,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                // autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 5,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                ]
            });
            $('.top_products_carousel').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                // autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
            $('.listProduct_carousel').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4,
                rows: 2,
                arrows: false,
                dots: true,
                // autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        });
    </script>

    
    <script src="<?= url_public ?>/assets/js/js.js"></script>
    <script src="<?= url_public ?>/assets/js/validate.js"></script>
    <script src="<?= url_public ?>/assets/js/script.js"></script>
    <script src="<?= url_public ?>/assets/js/chitietsp.js"></script>
    <script src="<?= url_public ?>/assets/js/message.js"></script>
    <script>
        <?php
        if(isset($_SESSION['user'])) {
        ?>
        getQuantityCart('<?=$_SESSION['user']['ma_kh']?>');
        <?php
        }
        ?>
        
    </script>
    <?php
        if (isset($_COOKIE['message'])) {
            echo $_COOKIE['message'];
        }

    ?>
</body>

</html>