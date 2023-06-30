<?php include "views/layout/header.php" ?>

<h3 class="alert alert-success">QUẢN LÝ LOẠI HÀNG</h3>

<form action="?ctl=store-loai" method="post">
    <div class="form-group">
        <label>Mã loại</label>
        <input name="ma_loai" value="auto number" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label>Tên loại</label>
        <input name="ten_loai" class="form-control">
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-default">Thêm mới</button>
        <button type="reset" class="btn btn-default">Nhập lại</button>
        <a href="?ctl=loai" class="btn btn-default">Danh sách</a>
    </div>
</form>
<?php include "views/layout/footer.php" ?>