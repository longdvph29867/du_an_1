<?php
// echo '<pre>';
// print_r($listLoai);
// echo '</pre>';
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sáchh sản phẩm</h1>
    <div>
        <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-white border-1 small" name="search" placeholder="Search..." value="<?php if (!empty($key)) echo $key; ?>">
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
                <th style="width: 5%;"></th>
                <th style="width: 10%;">Mã sản phẩm</th>
                <th style="width: 15%;">Tên sản phẩm</th>
                <th style="width: 15%;">Hình hàng hoá</th>
                <th style="width: 25%;">Mô tả</th>
                <th style="width: 10%;">Số lượt xem</th>
                <th style="width: 20%;">Thao tác</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($listSanPham as $item) {
            ?>
                <tr>
                    <td><input type="checkbox" name="ma_hh[]" value="<?= $item['ma_hh'] ?>"></td>
                    <td><?= $item['ma_hh'] ?></td>
                    <td><?= $item['ten_hh'] ?></td>
                    <td><img style="width: 80px;" src="<?= url_public . "/images/products/" . reset($item['hinhArr']) ?>" alt=""></td>
                    <td class="text-container"><?= $item['mo_ta'] ?></td>
                    <td><?= $item['so_luot_xem'] ?></td>
                    <th>
                        <a class="btn btn-primary" href="?ctl=ad-detail-hh&ma_hh=<?= $item['ma_hh'] ?>">Chi tiết</a>
                        <a onclick="return confirm('Bạn có chắc chắn xoá không?')" class="btn btn-danger" href="?ctl=ad-delete-hh&ma_hh=<?= $item['ma_hh'] ?>">Xóa</a>
                    </th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
                if((!isset($_GET['ctl']) || $_GET['ctl'] == 'ad-list') && !isset($_GET['search'])) {
                    for($i = 0; $i < $pageTotal; $i++) {
                    ?>
                        <li class="page-item"><a class="page-link <?php 
                            if(!isset($_GET['page']) && $i == 0) {
                                echo 'bg-primary text-white';
                            };
                            if((isset($_GET['page']) && $_GET['page']==$i+1)) {
                                echo 'bg-primary text-white';
                            }
                        ?>" href="?ctl=ad-list&page=<?=$i+1?>"><?=$i+1?></a></li>
                    <?php
                    }
                }
            ?>
        </ul>
    </nav>
</div>
