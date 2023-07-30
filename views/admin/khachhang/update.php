<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật khách hàng</h1>
    <div>
        <a href="?ctl=ad-list-kh" class="btn btn-primary">Danh sách</a>
    </div>
</div>
<div class="row">
    <form action="?ctl=khachhang-update&ma_kh=<?=$data['ma_kh']?>" method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="ma_kh">Mã khách hàng <span class="text-danger"></span></label>
                    <input id="ma_kh" type="text" name="ma_kh" class="form-control" value="<?=$data['ma_kh']?>" readonly>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="ho_ten">Tên Khách Hàng <span class="text-danger">*</span></label>
                    <input id="ho_ten" type="text" name="ho_ten" class="form-control" 
                    value="<?=$data['ho_ten']?>">
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
            <div class="col-md-12">
                <div class="form-group">
                    <label for="img">Hình ảnh <span class="text-danger">*</span></label>
                    <input id="" type="text" name="img_old" class="form-control d-none" 
                    value="<?=$data['hinh']?>">
                    <input type="file" name="img" class="form-control-file" id="img">
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-0">
                    <div class="mr-4">
                        <input type="submit" class="btn btn-success pt-2 btn-block" value="Thêm mới">
                    </div>
                    <div>
                        <input type="reset" class="btn btn-secondary pt-2 btn-block" value="Làm mới">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>