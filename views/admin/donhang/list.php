

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách đơn hàng</h1>
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
                <th style="width: 2%;"></th>
                <th style="width: 10%;">Mã đơn hàng</th>
                <th style="width: 13%;">Ngày đặt</th>
                <th style="width: 15%;">Tổng tiền</th>
                <th style="width: 30%;">Địa chỉ nhận</th>
                <th style="width: 15%;">Trạng thái</th>
                <th style="width: 15%;">Thao tác</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($listDonHang as $item) {
                $dia_chi = "$item[ten_nguoi_nhan], SĐT: $item[sdt_nguoi_nhan], $item[dia_chi_nhan]";
            ?>
                <tr>
                    <td><input type="checkbox" name="ma_dh[]" value="<?= $item['ma_dh'] ?>"></td>
                    <td><?=$item['ma_dh'] ?></td>
                    <td><?=$item['ngay_dat'] ?></td>
                    <td><?=$item['tong_tien'] ?> đ</td>
                    <td><?=$dia_chi ?></td>
                    <td><?=$item['ten_trang_thai'] ?></td>
                    <th>
                        <a class="btn btn-warning" href="?ctl=ad-update&ma_dh=<?=$item['ma_dh'] ?>">Cập nhật trạng thái</a>
                        <!-- <a onclick="return confirm('Bạn có chắc chắn xoá không?')" class="btn btn-danger" href="?ctl=loai-delete&ma_dh=<?=$item['ma_dh'] ?>">Xóa</a> -->
                    </th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    
</div>