<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới loại</h1>
    <div>
        <a href="?ctl=ad-list" class="btn btn-primary">Danh sách</a>
    </div>
</div>
<div>
    <form action="?ctl=khachhang-update&ma_kh=<?=$data['ma_kh']?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ma_kh">Mã khách hàng <span class="text-danger">*</span></label>
                    <input id="ma_kh" type="text" name="ma_kh" class="form-control" value="<?=$data['ma_kh']?>" disabled>
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['ma_kh'])) {
                            echo $errors['ma_kh'];
                        }
                        ?>
                    </small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ho_ten">Tên khách hàng <span class="text-danger">*</span></label>
                    <input id="ho_ten" type="text" name="ho_ten" class="form-control" value="<?=$data['ho_ten']?>">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['ho_ten'])) {
                            echo $errors['ho_ten'];
                        }
                        ?>
                    </small>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="mat_khau_old">Mật khẩu cũ <span class="text-danger">*</span></label>
                    <input id="mat_khau_old" type="password" name="mat_khau_old" class="form-control" value="">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['mat_khau_old'])) {
                            echo $errors['mat_khau_old'];
                        }
                        ?>
                    </small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="mat_khau">Mật khẩu mới <span class="text-danger">*</span></label>
                    <input id="mat_khau" type="password" name="mat_khau" class="form-control" value="">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['mat_khau'])) {
                            echo $errors['mat_khau'];
                        }
                        ?>
                    </small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="re_mat_khau">Nhập lại mật khẩu mới <span class="text-danger">*</span></label>
                    <input id="re_mat_khau" type="password" name="re_mat_khau" class="form-control" value="">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['re_mat_khau'])) {
                            echo $errors['re_mat_khau'];
                        }
                        ?>
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sdt">Số điện thoại <span class="text-danger">*</span></label>
                    <input id="sdt" type="number" name="sdt" class="form-control" value="<?=$data['sdt']?>">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['sdt'])) {
                            echo $errors['sdt'];
                        }
                        ?>
                    </small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input id="email" type="text" name="email" class="form-control" value="<?=$data['email']?>">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['email'])) {
                            echo $errors['email'];
                        }
                        ?>
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hinh">Hình ảnh <span class="text-danger">*</span></label>
                    <input id="" type="text" name="img_old" class="form-control d-none" 
                    value="<?=$data['hinh']?>">
                    <input type="file" name="file" class="form-control-file" id="hinh">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['hinh'])) {
                            echo $errors['hinh'];
                        }
                        ?>
                    </small>
                    <span class="text-dark d-block"><?=$data['hinh']?></span>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="d-block">Vai trò <span class="text-danger">*</span></label>
                <div>
                    <label>
                        <input type="radio" name="vai_tro" value="1" <?php if ($data['vai_tro'] == 1) echo "checked" ?>> Quản trị
                    </label>
                    <label>
                        <input type="radio" name="vai_tro" value="0" <?php if ($data['vai_tro'] == 0) echo "checked" ?>> Khách hàng
                    </label>
                </div>
                <small id="helpId" class="text-danger d-block">
                    <?php
                    if (!empty($errors['vai_tro'])) {
                        echo $errors['vai_tro'];
                    }
                    ?>
                </small>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-0">
                    <div class="mr-4">
                        <input type="submit" class="btn btn-warning pt-2 btn-block" value="Cập nhật">
                    </div>
                    <div class="mr-4">
                        <input type="reset" class="btn btn-secondary pt-2 btn-block" value="Làm mới">
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>