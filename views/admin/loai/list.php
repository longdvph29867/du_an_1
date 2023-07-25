<?php
// echo '<pre>';
// print_r($listLoai);
// echo '</pre>';
?>

<div class="mb-3">
    <button class="btn btn-primary" id="check-all" type="button">Chọn tất cả</button>
    <button class="btn btn-secondary" id="clear-all" type="button">Bỏ chọn tất cả</button>
    <button class="btn btn-danger" name="btn-delete-all" onclick="return confirm('Bạn có chắc chắn xoá không?')">Xóa các mục đã chọn</button>
    <a href="#" class="btn btn-success">Thêm mới</a>
</div>
<table class="table bg-white">
    <thead class="bg-primary text-white">
        <tr>
            <th></th>
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Hình ảnh</th>
            <th>Thao tác</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($listLoai as $item) {
        ?>
            <tr>
                <td><input type="checkbox" name="ma_loai[]" value="<?= $item['ma_loai'] ?>"></td>
                <td><?php echo $item['ma_loai'] ?></td>
                <td><?php echo $item['ten_loai'] ?></td>
                <td><img style="width: 80px;" src="<?php echo url_public ."/images/category/" . $item['hinh_loai'] ?>" alt=""></td>
                <th>
                    <a class="btn btn-warning" href="index.php?btn-edit&maloai=<?php echo $item['ma_loai'] ?>">Sửa</a>
                    <a onclick="return confirm('Bạn có chắc chắn xoá không?')" class="btn btn-danger" href="index.php?btn-delete&maloai=<?php echo $item['ma_loai'] ?>">Xóa</a>
                </th>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>