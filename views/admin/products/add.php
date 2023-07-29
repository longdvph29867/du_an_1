<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới loại</h1>
    <div>
        <a href="?ctl=ad-list" class="btn btn-primary">Danh sách</a>
    </div>
</div>
<div>
    <form action="?ctl=hh-insert" method="POST" enctype="multipart/form-data" id="form-insert-hh">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ma_loai">Mã sản phẩm <span class="text-danger"></span></label>
                    <input id="ma_loai" type="text" name="" class="form-control" value="Auto number" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ten_hh">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input id="ten_hh" type="text" name="ten_hh" class="form-control" value="">
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['ten_hh'])) {
                            echo $errors['ten_hh'];
                        }
                        ?>
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="">Loại hàng <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select name="ma_loai" class="custom-select" id="inputGroupSelect04">
                            <option selected hidden value="">Choose...</option>
                            <?php
                            foreach ($listLoai as $loai) {
                            ?>
                                <option <?php
                                        if (isset($ma_loai) && $ma_loai == $loai['ma_loai']) {
                                            echo 'selected';
                                        }
                                        ?> value="<?= $loai["ma_loai"] ?>"><?= $loai["ten_loai"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <small id="fileHelpId" class="form-text text-danger d-block">
                        <?php
                        if (!empty($errors['ma_loai'])) {
                            echo $errors['ma_loai'];
                        }
                        ?>
                    </small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="d-block">Hàng đặc biệt <span class="text-danger">*</span></label>
                    <div>
                        <label>
                            <input type="radio" name="dac_biet" value="1" <?php if (isset($dac_biet) && $dac_biet == 1) echo "checked" ?>> Đặc biệt
                        </label>
                        <label>
                            <input type="radio" name="dac_biet" value="0" <?php if (isset($dac_biet) && $dac_biet == 0) echo "checked" ?>> Bình tường
                        </label>
                    </div>
                    <small id="helpId" class="error-dacbiet text-danger d-block">
                        <?php
                        if (!empty($errors['dac_biet'])) {
                            echo $errors['dac_biet'];
                        }
                        ?>
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mo_ta">Mô tả <span class="text-danger">*</span></label>
                    <textarea name="mo_ta" id="mo_ta" cols="30" class="w-100" rows="5"><?php if (isset($mo_ta)) echo $mo_ta ?></textarea>
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['mo_ta'])) {
                            echo $errors['mo_ta'];
                        }
                        ?>
                    </small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="files">Hình hàng hoá <span class="text-danger">*</span></label>
                    <input onchange="displaySelectedFiles()" type="file" class="form-control-file" id="files" name="files[]" multiple>
                    <div id="fileNames"></div>
                </div>
                <small id="helpId" class="text-danger">
                    <?php
                    if (!empty($errors['hinh'])) {
                        echo $errors['hinh'];
                    }
                    ?>
                </small>
            </div>
        </div>
        <div id="list-thuoc-tinh">
            <h5>Thuộc tính sản phẩm:</h5>
            <div class="thuoc-tinh-div border bg-white p-3 rounded mb-3">
                <div class="text-right pb-2">
                    <button onclick="removeFormThuocTinh(this)" type="button" class="btn btn-danger my-auto"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="don_vi">Đơn vị <span class="text-danger">*</span></label>
                            <input id="don_vi" type="text" name="don_vi[]" class="form-control" value="">
                            <small id="helpId" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="don_gia">Đơn giá <span class="text-danger">*</span></label>
                            <input id="don_gia" type="number" name="don_gia[]" class="form-control" value="">
                            <small id="helpId" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="giam_gia">Giảm giá <span class="text-danger">*</span></label>
                            <input id="giam_gia" type="number" name="giam_gia[]" class="form-control" value="">
                            <small id="helpId" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="so_luong">Số lượng hàng <span class="text-danger">*</span></label>
                            <input id="so_luong" type="number" name="so_luong[]" class="form-control" value="">
                            <small id="helpId" class="text-danger"></small>
                        </div>
                    </div>
                </div>
                <small id="helpId" class="text-danger">
                    <?php
                    if (!empty($errors['thuoc_tinh'])) {
                        echo $errors['thuoc_tinh'];
                    }
                    ?>
                </small>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-0">
                    <div class="mr-4">
                        <input type="submit" class="btn btn-success pt-2 btn-block" value="Thêm mới">
                    </div>
                    <div class="mr-4">
                        <input type="reset" class="btn btn-secondary pt-2 btn-block" value="Làm mới">
                    </div>
                    <div>
                        <button type="button" onclick="addFormThuocTinh()" class="btn btn-primary pt-2 btn-block">Thêm thuộc tính</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>