
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=url_public?>/assets/images/logo-icon.png" type="image/x-icon">
    <title>Food Market</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Lora:wght@500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- slick slide -->
    <link rel="stylesheet" type="text/css" href="<?=url_public?>/assets/css/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?=url_public?>/assets/css/slick/slick-theme.css" />
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
    <style>
        .error {
            font-size: 14px;
            color: red;
        }
    </style>
</head>

<body class="font-['Raleway']">
    <!-- header -->
    <?php require "header/header.php";?>
    
    <div class="lg:h-[143px] md:h-[130px] h-[178px] "></div>
    <!-- trang home -->
    <?php include $view_name;?>


    
    <?php require "footer/footer.php";?>

    <!--  -->
    <!-- <div class="h-[500px]">
        123
    </div> -->

    <div id="back-to-top" class="fixed bottom-6 right-6 hidden">
        <div class="w-12 h-12 text-white text-2xl bg-[#62d2a2] hover:opacity-70 cursor-pointer rounded-md flex items-center justify-center ">
            <i class="fa-solid fa-chevron-up"></i>
        </div>
    </div>
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
            }
            else {
                headerEl.classList.remove('scrollHeader')
            }
        })
    </script>

    <!-- slick banner -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script type="text/javascript" src="<?=url_public?>/assets/js/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
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
                responsive: [
                    {
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
                responsive: [
                    {
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

    <!-- validate -->
    <script>
        $().ready(function() {
            // file đuôi file
            $.validator.addMethod('fileExtension', function(value, element, param) {
                param = typeof param === 'string' ? param.replace(/\s/g, '') : '';
                var extensions = param.split(',');
                var fileExtension = value.split('.').pop().toLowerCase();
                return this.optional(element) || $.inArray(fileExtension, extensions) !== -1;
            }, 'Please select a file with a valid extension.');

            // file size
            $.validator.addMethod('fileSize', function(value, element, param) {
                var fileSize = element.files[0].size; // Lấy kích thước tệp tin
                var maxSize = param * 1024 * 1024; // Chuyển đổi giá trị đơn vị thành byte

                return this.optional(element) || fileSize <= maxSize;
            }, 'File size must be less than or equal to {0} MB.');
            $('#change_info').validate({
                rules: {
                    ho_ten: {
                        required: true,
                        maxlength: 30,
                        minlength: 6,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    hinh: {
                        fileExtension: 'png,jpeg,jpg,webp',
                        fileSize: 2,
                        maxlength: 45,
                    },
                },
                messages: {
                    ho_ten: {
                        required: 'Vui lòng nhập họ tên!',
                        maxlength: 'Họ tên phải 6 - 30 ký tự!',
                        minlength: 'Họ tên phải 6 - 30 ký tự!'
                    },
                    email: {
                        required: 'Vui lòng nhập Email!',
                        email: 'Email chưa đúng định dạng!'
                    },
                    hinh: {
                        fileExtension: 'File phải có định dạng là png, jpg, jpeg, webp!',
                        fileSize: 'Kích thước không quá 2 MB!',
                        maxlength: 'Tên file quá dài!',
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            $('#change_password').validate({
                rules: {
                    mat_khau: {
                        required: true,
                    },
                    mat_khau2: {
                        required: true,
                        maxlength: 16,
                        minlength: 6,
                    },
                    mat_khau3: {
                        required: true,
                        equalTo: '#mat_khau2'
                    },
                },
                messages: {
                    mat_khau: {
                        required: 'Vui lòng nhập mật khẩu!',
                    },
                    mat_khau2: {
                        required: 'Vui lòng nhập mật khẩu mới!',
                        maxlength: 'Mật khẩu phải 6 - 16 ký tự!',
                        minlength: 'Mật khẩu phải 6 - 16 ký tự!'
                    },
                    mat_khau3: {
                        required: 'Vui lòng nhập lại mật khẩu mới!',
                        equalTo: 'Mật khẩu mới không khớp!'
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>

    <script src="<?=url_public?>/assets/js/js.js"></script>
</body>

</html>