<?php include "views/layout/header.php" ?>

<h3 class="alert alert-success">QUẢN LÝ LOẠI HÀNG</h3>

<form action="?ctl=update-loai" method="post">
    <div class="form-group">
        <label>Mã loại</label>
        <input name="ma_loai" class="form-control" value="<?=$loai['ma_loai']?>" readonly>
    </div>

    <div class="form-group">
        <label>Tên loại</label>
        <input name="ten_loai" class="form-control" value="<?=$loai['ten_loai']?>">

    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default">Cập nhật</button>
        <button type="reset" class="btn btn-default">Nhập lại</button>
        <a href="?ctl=loai-hang" class="btn btn-default">Danh sách</a>
    </div>
</form>
<?php include "views/layout/footer.php" ?>