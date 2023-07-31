<?php
// echo '<pre>';
// print_r($listLoai);
// echo '</pre>';
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách khách hàng</h1>
    <div>
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-white border-1 small" name="search" placeholder="Search..."
                value="<?php if(!empty($key)) echo $key; ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div>
    <div class="mb-3">
        <button class="btn btn-primary" id="check-all" type="button">Chọn tất cả</button>
        <button class="btn btn-secondary" id="clear-all" type="button">Bỏ chọn tất cả</button>
        <button class="btn btn-danger" name="btn-delete-all" onclick="return confirm('Bạn có chắc chắn xoá không?')">Xóa các mục đã chọn</button>
        <a href="?ctl=ad-add" class="btn btn-success">Thêm mới</a>
    </div>
    <table class="table bg-white">
        <thead class="bg-primary text-white">
            <tr>
                <th></th>
                <th>Mã khách hàng</th>
                <th>Tên Khách hàng</th>
                <th>Hình ảnh</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($listkhachhang as $item) {
            ?>
                <tr>
                    <td><input type="checkbox" name="ma_kh[]" value="<?= $item['ma_kh'] ?>"></td>
                    <td><?=$item['ma_kh'] ?></td>
                    <td><?=$item['ho_ten'] ?></td>
                    <td><img style="width: 80px;" src="<?=url_public . "/images/users/" . $item['hinh'] ?>" alt=""></td>
                    <td><?=$item['sdt'] ?></td>
                    <td><?=$item['email'] ?></td>
                    <td>
                        <?php
                        if($item['vai_tro'] == 0) {
                            echo "<span style='color: #389e0d; background: #f6ffed; border: 1px solid #b7eb8f; border-radius: 4px; padding: 0 2px;'>Khách hàng</span>";
                            
                        }
                        else {
                            echo "<span style='color: #cf1322; background: #fff1f0; border: 1px solid #ffa39e; border-radius: 4px; padding: 0 2px;'>Quản trị</span>";
                        }
                    ?></td>
                    <th>
                        <a class="btn btn-warning" href="?ctl=ad-update-kh&ma_kh=<?=$item['ma_kh'] ?>">Sửa</a>
                        <?php
                        if($item['ma_kh'] != $_SESSION['user']['ma_kh']) {
                            ?>
                            <a onclick="return confirm('Bạn có chắc chắn xoá không?')" class="btn btn-danger" href="?ctl=khachhang-delete&ma_kh=<?=$item['ma_kh'] ?>">Xóa</a>

                            <?php
                        }
                        ?>
                    </th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>