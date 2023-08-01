<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=$url_content?>/image-layout/logo-icon.png" type="image/x-icon">
    <title>Food Market</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Lora:wght@500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- cdn Lottie web -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.11/lottie.min.js"></script>

    <link rel="stylesheet" href="<?=url_public?>/assets/css/mesages.css">
    <style>
        .error {
            font-size: 14px;
            color: red;
        }
    </style>
</head>

<body>
    <div class="w-screen h-screen flex items-center justify-center bg-gray-400 px-5 
    bg-[url('<?=url_public ?>/assets/images/bg-login.jpg')]
    bg-cover
    bg-center
    relative
    ">
        <div class="p-5 bg-white rounded w-full md:max-w-3xl max-w-md max-h-screen min-h-[45%] overflow-x-auto relative z-10 grid md:grid-cols-2 grid-cols-1 items-center">
            <div id="animation" class="hidden md:block"></div>
            <div>
                <?php include $view_name; ?>
            </div>
        </div>
        <div class="
        absolute
        w-full
        h-full
        left-0
        top-0
        bg-black/50
        ">
        </div>
    </div>
    <div id="toast" class="">
        <div id="img">
            <i class="fa-solid fa-circle-check"></i>
            <i class="fa-solid fa-circle-exclamation"></i>
        </div>
        <div id="desc">A notification message..</div>
    </div>
    <div id="animation"></div>

    <script src="<?= url_public ?>/assets/js/message.js"></script>
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
            $('#form-register').validate({
                rules: {
                    ma_kh: {
                        required: true,
                        maxlength: 16,
                        minlength: 6,
                    },
                    mat_khau: {
                        required: true,
                        maxlength: 16,
                        minlength: 6,
                    },
                    re_password: {
                        required: true,
                        equalTo: '#mat_khau'
                    },
                    ho_ten: {
                        required: true,
                        maxlength: 30,
                        minlength: 6,
                    },
                    sdt: {
                        required: true,
                        maxlength: 10,
                        minlength: 10,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    hinh: {
                        required: true,
                        fileExtension: 'png,jpeg,jpg,webp',
                        fileSize: 2,
                        maxlength: 100,
                    },
                },
                messages: {
                    ma_kh: {
                        required: 'Vui lòng nhập tài khoản!',
                        maxlength: 'Tài khoản phải 6 - 16 ký tự!',
                        minlength: 'Tài khoản phải 6 - 16 ký tự!'
                    },
                    mat_khau: {
                        required: 'Vui lòng nhập mật khẩu!',
                        maxlength: 'Mật khẩu phải 6 - 16 ký tự!',
                        minlength: 'Mật khẩu phải 6 - 16 ký tự!'
                    },
                    re_password: {
                        required: 'Vui lòng nhập lại mật khẩu!',
                        equalTo: 'Mật khẩu không khớp!'
                    },
                    ho_ten: {
                        required: 'Vui lòng nhập họ tên!',
                        maxlength: 'Họ tên phải 6 - 30 ký tự!',
                        minlength: 'Họ tên phải 6 - 30 ký tự!'
                    },
                    sdt: {
                        required: 'Vui lòng nhập số điện thoại!',
                        maxlength: 'Số điện thoại chỉ 10 số!',
                        minlength: 'Số điện thoại phải 10 số!'
                    },
                    email: {
                        required: 'Vui lòng nhập Email!',
                        email: 'Email chưa đúng định dạng!'
                    },
                    hinh: {
                        required: 'Vui lòng chọn file!',
                        fileExtension: 'File phải có định dạng là png, jpg, jpeg, webp!',
                        fileSize: 'Kích thước không quá 2 MB!',
                        maxlength: 'Tên file quá dài!',
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            $('#form-login').validate({
                rules: {
                    ma_kh: {
                        required: true,
                    },
                    mat_khau: {
                        required: true,
                    },
                },
                messages: {
                    ma_kh: {
                        required: 'Vui lòng nhập tài khoản!',
                    },
                    mat_khau: {
                        required: 'Vui lòng nhập mật khẩu!',
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            $('#form-get-password').validate({
                rules: {
                    ma_kh: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    ma_kh: {
                        required: 'Vui lòng nhập tài khoản!',
                    },
                    email: {
                        required: 'Vui lòng nhập Email!',
                        email: 'Email chưa đúng định dạng!'
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>

    <?php
        if (isset($_COOKIE['message'])) {
            echo $_COOKIE['message'];
        }

    ?>

    <script>
        <?php
            if($_GET['ctl'] == 'login' || $_GET['ctl'] == 'login-khachhang') {
                ?>
                    const jsonFilePath = '<?= url_public ?>/assets/json/animation_lkr0e7ob.json';
                <?php
            }
            else {
                ?>
                    const jsonFilePath = '<?= url_public ?>/assets/json/animation_lks6w5ib.json';
                <?php
            }
        ?>

        const animation = lottie.loadAnimation({
            container: document.getElementById('animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: jsonFilePath
        });
    </script>

</body>

</html>