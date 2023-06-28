<?php include "views/layout/header.php" ?>
<h3 class="alert alert-success">QUẢN LÝ LOẠI HÀNG</h3>

<?php
if ($message != '') {
?>
    <div class="alert alert-success"><?= $message ?></div>
<?php
}

?>

<form action="?ctl=delete" method="post">
    <table class="table">
        <thead class="alert-success">
            <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($loaihang as $loai) {
            ?>
                <tr>
                    <th><input type="checkbox" name="ma_loai[]" value="<?= $loai['ma_loai'] ?>"></th>
                    <td>
                        <?= $loai['ma_loai'] ?>
                    </td>
                    <td>
                        <?= $loai['ten_loai'] ?>
                    </td>
                    <td>
                        <a href="?ctl=edit-loai&id=<?=$loai['ma_loai']?>" class="btn btn-default btn-sm">Sửa</a>
                        <a href="?ctl=del-loai&id=<?=$loai['ma_loai']?>" class="btn btn-default btn-sm" onclick="return confirm('Bạn có chắc chắn xoá không')" >Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <button id="check-all" type="button" class="btn btn-default">Chọn tất cả</button>
                    <button id="clear-all" type="button" class="btn btn-default">Bỏ chọn tất cả</button>
                    <button id="btn-delete" name="btn_delete" class="btn btn-default">Xóa các mục chọn</button>
                    <a href="?ctl=add-loai" class="btn btn-default">Nhập thêm</a>
                </td>
            </tr>
        </tfoot>
    </table>
</form>
<?php include "views/layout/footer.php" ?>