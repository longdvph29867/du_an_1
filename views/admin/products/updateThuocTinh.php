<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật thuộc tính</h1>
    <div>
        <a href="?ctl=ad-list" class="btn btn-primary">Trở về <i class="fa-solid fa-chevron-right"></i></i></a>
    </div>
</div>
<div class="row">
    <form action="?ctl=ad-update-thuoctinh&ma_hh=<?=$_GET['ma_hh']?>&ma_cthh=<?=$_GET['ma_cthh']?>" method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">
        <input type="text" name='ma_hh' value="<?=$_GET['ma_hh']?>" class="d-none">
        <input type="text" name='ma_cthh' value="<?=$_GET['ma_cthh']?>" class="d-none">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="don_vi">Đơn vị <span class="text-danger">*</span></label>
                    <input id="don_vi" type="text" name="don_vi" class="form-control" 
                    value="<?php if(!empty($dataThuocTinh['don_vi'])) echo $dataThuocTinh['don_vi']; ?>">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['don_vi'])) {
                            echo $errors['don_vi'];
                        }
                        ?>
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="don_gia">Đơn giá <span class="text-danger">*</span></label>
                    <input id="don_gia" type="number" name="don_gia" class="form-control" 
                    value="<?php if(!empty($dataThuocTinh['don_gia'])) echo $dataThuocTinh['don_gia']; ?>">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['don_gia'])) {
                            echo $errors['don_gia'];
                        }
                        ?>
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="giam_gia">Giảm giá <span class="text-danger">*</span></label>
                    <input id="giam_gia" type="number" name="giam_gia" class="form-control" 
                    value="<?php if(!empty($dataThuocTinh['giam_gia'])) echo $dataThuocTinh['giam_gia']; ?>">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['giam_gia'])) {
                            echo $errors['giam_gia'];
                        }
                        ?>
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="so_luong">Số lượng <span class="text-danger">*</span></label>
                    <input id="so_luong" type="number" name="so_luong" class="form-control" 
                    value="<?php if(!empty($dataThuocTinh['so_luong'])) echo $dataThuocTinh['so_luong']; ?>">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['so_luong'])) {
                            echo $errors['so_luong'];
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
                        <input type="submit" class="btn btn-warning pt-2 btn-block" value="Cập nhật">
                    </div>
                    <div>
                        <input type="reset" class="btn btn-secondary pt-2 btn-block" value="Làm mới">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>