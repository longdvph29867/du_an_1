<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới Khách Hàng</h1>
    <div>
        <a href="?ctl=ad-listkhachhang" class="btn btn-primary">Danh sách khách hàng</a>
    </div>
</div>
<div class="row">
    <form action="?ctl=khachhang-insert" method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="ma_kh">Mã khách hàng: <span class="text-danger"></span></label>
                    <input id="ma_kh" type="text" name="" class="form-control" value="Auto number" readonly>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="ho_ten">Tên Khách Hàng <span class="text-danger">*</span></label>
                    <input id="ho_ten" type="text" name="ho_ten" class="form-control" 
                    value="<?php if(!empty($ho_ten)) echo $ho_ten; ?>">
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
                    <label for="img_kh">Hình ảnh <span class="text-danger">*</span></label>
                    <input type="file" name="img" class="form-control-file" id="img">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['hinh'])) {
                            echo $errors['hinh'];
                        }
                        ?>
                    </small>
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