        <div>
            <h3>Chi tiết hàng hoá</h3>
            <div>

                <h5>Tên sản phẩm: <span><?= $hh_detail['ten_hh'] ?></span></h5>
                <p>Ngày nhập: <span><?= $hh_detail['ngay_nhap'] ?></span></p>
                <p>Loại đặc biệt: <span><?= $hh_detail['dac_biet'] ?></span></p>
                <p>Lượt xem: <span><?= $hh_detail['so_luot_xem'] ?></span></p>
                <p>Loại: <span><?= $hh_detail['ten_loai'] ?></span></p>
                <p>Mô tả: <span><?= $hh_detail['mo_ta'] ?></span></p>
                <div>
                    <p class="">Hình ảnh:</p>
                    <div class="row">
                        <?php
                        foreach ($hh_detail['hinhArr'] as $key => $item) {

                        ?>
                            <div class="col-2">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <div class="position-relative border">
                                        <img class="w-100" src="<?= url_public . "/images/products/" . $item ?>" alt="">
                                        <a onclick="return confirm('Bạn có chắc chắn xoá không?')" href="?ctl=hh-delete-hinh&ma_hh=<?=$hh_detail['ma_hh'] ?>&ma_hinh=<?= $key ?>" class="btn btn-danger btn-circle btn-sm position-absolute top-0 end-0" style="transform: translate(-60%, -40%);"><i class="fa-solid fa-xmark"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-2">
                            <div class="h-100 d-flex justify-content-start align-items-center">
                                <form action="?ctl=hh-insert-hinh&ma_hh=<?= $hh_detail['ma_hh'] ?>" method="POST" enctype="multipart/form-data" id="add-img-hang-hoa">
                                    <label>
                                        <input onchange="submitForm('add-img-hang-hoa')" type="file" name="file" class="d-none">
                                        <span class="btn btn-success btn-circle btn-lg"><i class="fa-solid fa-plus"></i></span>
                                    </label>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mt-3">
                    <h5>Thuộc tính:</h5>
                    <table class="table">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 20%;">Đơn vị</th>
                                <th style="width: 20%;">Đơn giá</th>
                                <th style="width: 20%;">Giảm giá</th>
                                <th style="width: 20%;">Số lượng</th>
                                <th style="width: 20%;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($hh_detail['chi_tiet_sp'] as $item) {

                            ?>
                                <tr>
                                    <td><?=$item['don_vi']?></td>
                                    <td><?=$item['don_gia']?></td>
                                    <td><?=$item['giam_gia']?></td>
                                    <td><?=$item['so_luong']?></td>
                                    <td>
                                    <a class="btn btn-warning" href="#">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc chắn xoá không?')" class="btn btn-danger" href="#">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>