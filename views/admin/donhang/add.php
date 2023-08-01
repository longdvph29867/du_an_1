<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới loại</h1>
    <div>
        <a href="?ctl=ad-list" class="btn btn-primary">Danh sách</a>
    </div>
</div>
<div class="row">
    <form action="?ctl=loai-insert" method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="ma_loai">Mã Loại <span class="text-danger"></span></label>
                    <input id="ma_loai" type="text" name="" class="form-control" value="Auto number" readonly>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="ten_loai">Tên Loại <span class="text-danger">*</span></label>
                    <input id="ten_loai" type="text" name="ten_loai" class="form-control" 
                    value="<?php if(!empty($ten_loai)) echo $ten_loai; ?>">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['ten_loai'])) {
                            echo $errors['ten_loai'];
                        }
                        ?>
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="img_loai">Hình ảnh <span class="text-danger">*</span></label>
                    <input type="file" name="img_loai" class="form-control-file" id="img_loai">
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