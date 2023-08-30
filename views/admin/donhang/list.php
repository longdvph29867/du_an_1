
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách đơn hàng</h1>
    <div>
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="number" class="form-control bg-white border-1 small" name="search" placeholder="Mã đơn hàng..."
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
    <div class="mb-3 d-flex align-items-center justify-content-end">
        <!-- <button class="btn btn-primary" id="check-all" type="button">Chọn tất cả</button>
        <button class="btn btn-secondary" id="clear-all" type="button">Bỏ chọn tất cả</button>
        <button class="btn btn-danger" name="btn-delete-all" onclick="return confirm('Bạn có chắc chắn xoá không?')">Xóa các mục đã chọn</button> -->
        <form action="" method="GET" id="ad-filter-hh">
            <input type='text' name='ctl' value='trang-thai' class='d-none'>
        <?php
        
        ?> 
        <select onchange="submitFormSelectAdminHH()" name="ma_trang_thai" class="px-2 py-1 border min-w-[180px] rounded mr-[2px] outline-none" >
            <option value="" hidden>---Lọc--</option>
            <option <?php if(isset($_GET['ma_trang_thai']) && $_GET['ma_trang_thai'] == 'all') echo 'selected';?>  value="all">Tất cả</option>
            <?php
                foreach($listTrangThai as $item) {
                ?>
                    <option <?php if(isset($_GET['ma_trang_thai']) && $_GET['ma_trang_thai'] == $item['ma_trang_thai']) echo 'selected';?>  value="<?=$item['ma_trang_thai']?>"><?=$item['ten_trang_thai']?></option>
                <?php
                }
            ?>
        </select>
    </form>
    </div>
    <table class="table bg-white">
        <thead class="bg-primary text-white">
            <tr>
                <!-- <th style="width: 2%;"></th> -->
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
                    <!-- <td><input type="checkbox" name="ma_dh[]" value="<?= $item['ma_dh'] ?>"></td> -->
                    <td><?=$item['ma_dh'] ?></td>
                    <td><?=$item['ngay_dat'] ?></td>
                    <td><?=number_format($item['tong_tien'], 0, ',', '.') ?> đ</td>
                    <td><?=$dia_chi ?></td>
                    <td class="d-flex justify-content-center align-items-center">
                        <span class="p-1 rounded"
                        <?php
                        switch($item['ma_trang_thai']) {
                            case '5':
                                echo "style='color: #d62728; background-color: rgba(214, 39, 40, 0.2);'";
                                break;
                            case '1':
                                echo "style='color: #ff7f0e; background-color: rgba(255, 127, 14, 0.2);'";
                                break;
                            case '2':
                                echo "style='color: #f6c23e; background-color: rgba(246, 194, 62, 0.2);'";
                                break;
                            case '3':
                                echo "style='color: #2ca02c; background-color: rgba(44, 160, 44, 0.2);'";
                                break;
                            case '4':
                                echo "style='color: #1f77b4; background-color: rgba(31, 119, 180, 0.2);'";
                                break;
                            case '8':
                                echo "style='color: #fff; background-color: #1f77b4;'";
                                break;
                        }
                        ?>
                        
                        
                        ><?=$item['ten_trang_thai'] ?></span>
                    </td>
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