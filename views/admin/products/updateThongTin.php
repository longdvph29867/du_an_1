
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin</h1>
    <div>
        <a href="?ctl=ad-list" class="btn btn-primary">Trở về <i class="fa-solid fa-chevron-right"></i></i></a>
    </div>
</div>
<div>
    <form action="?ctl=ad-update-thongtin&ma_hh=<?=$data['ma_hh']?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ma_loai">Mã sản phẩm <span class="text-danger"></span></label>
                    <input id="ma_loai" type="text" name="ma_hh" class="form-control" value="<?php if(!empty($data['ma_hh'])) echo $data['ma_hh']; ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ten_hh">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input id="ten_hh" type="text" name="ten_hh" class="form-control" value="<?php if(!empty($data['ten_hh'])) echo $data['ten_hh']; ?>">
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
                                        if (isset($data['ma_loai']) && $data['ma_loai'] == $loai['ma_loai']) {
                                            echo 'selected';
                                        }
                                        ?> value="<?= $loai["ma_loai"] ?>"><?= $loai["ten_loai"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <small id="fileHelpId" class="form-text text-danger">
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
                            <input type="radio" name="dac_biet" value="1" <?php if (isset($data['dac_biet']) && $data['dac_biet'] == 1) echo "checked" ?>> Đặc biệt
                        </label>
                        <label>
                            <input type="radio" name="dac_biet" value="0" <?php if (isset($data['dac_biet']) && $data['dac_biet'] == 0) echo "checked" ?>> Bình tường
                        </label>
                    </div>
                    <small id="helpId" class="text-danger d-block">
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
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mo_ta">Mô tả <span class="text-danger">*</span></label>
                    <textarea name="mo_ta" id="mo_ta" cols="30" class="w-100" rows="5"><?php if(!empty($data['mo_ta'])) echo $data['mo_ta']; ?></textarea>
                    <small id="helpId" class="text-danger">
                        <?php
                        if (!empty($errors['mo_ta'])) {
                            echo $errors['mo_ta'];
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
                    <div class="mr-4">
                        <input type="reset" class="btn btn-secondary pt-2 btn-block" value="Làm mới">
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>