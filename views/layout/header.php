<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Quản trị website</title>
    <script src="public/assets/js/jquery.min.js" type="text/javascript"></script>

    <script src="public/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="public/assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <script src="public/assets/js/jquery-ui.min.js" type="text/javascript"></script>

    <script>
        $(function() {
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h1 class="alert alert-danger">QUẢN TRỊ WEBSITE</h1>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Trang chủ</a>
                </div>


                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="?ctl=loai-hang">Loại hàng</a></li>
                        <li><a href="#">Hàng hóa</a></li>
                        <li><a href="#">Khách hàng</a></li>
                        <li><a href="#">Bình luận</a></li>
                        <li><a href="#">Thống kê</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>