<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật trạng thái</h1>
    <div>
        <a href="?ctl=ad-list" class="btn btn-primary">Danh sách</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="bg-white p-5 shadow rounded-xl">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h4 class="text-dark">Mã đơn hàng: <span><?= $data['ma_dh'] ?></span></h4>
                <div>
                    <p class="m-0 text-right">Ngày đặt hàng: <span class="text-dark font-weight-bold"><?= $data['ngay_dat'] ?></span></p>
                    <p class="m-0 text-right">Đơn vị vận chuyển: <span class="text-dark font-weight-bold"><?= $data['ten_van_chuyen'] ?></span></p>
                </div>
            </div>
            <ul class="d-flex justify-content-between mx-0 mt-0 mb-2 px-0 pt-0 pb-2">
                <li class="position-relative list-unstyled" style="width: 40px;">
                    <?php
                    if($data['ma_trang_thai']== 5) {
                    ?>
                        <span class="btn btn-danger btn-circle position-relative" style="z-index: 1;">
                            <i class="fa-regular fa-circle-xmark"></i>
                        </span>
                    <?php
                    }
                    else {
                    ?>
                        <span class="btn btn-success btn-circle position-relative" style="z-index: 1;">
                            <i class="fa-regular fa-circle-check"></i>
                        </span>
                    <?php
                    }
                    ?>
                    <!-- <span class="btn btn-success btn-circle position-relative" style="z-index: 1;">
                        <i class="fa-regular fa-circle-check"></i>
                    </span> -->
                </li>
                <li class="position-relative d-flex justify-content-end" style="width: 33.333%;">
                <?php
                if($data['ma_trang_thai'] == 1 || $data['ma_trang_thai'] == 5) {
                ?>
                    <span class=" btn btn-success btn-circle position-relative border-0 text-white bg-gray-400" style="z-index: 1;">
                        <i class="fa-regular fa-circle"></i>
                    </span>
                    <div style="position: absolute; right: 2%; top: 15px; height: 10px;" class="w-100 bg-gray-400"></div>
                <?php
                }
                else {
                ?>
                    <span class=" btn btn-success btn-circle position-relative" style="z-index: 1;">
                        <i class="fa-regular fa-circle-check"></i>
                    </span>
                    <div style="position: absolute; right: 2%; top: 15px; height: 10px;" class="w-100 bg-success"></div>
                <?php
                }
                ?>
                    <!-- <span class=" btn btn-success btn-circle position-relative" style="z-index: 1;">
                        <i class="fa-regular fa-circle-check"></i>
                    </span>
                    <div style="position: absolute; right: 2%; top: 15px; height: 10px;" class="w-100 bg-success"></div> -->
                </li>
                <li class="position-relative list-unstyled d-flex justify-content-end" style="width: 33.333%;">
                <?php
                if($data['ma_trang_thai'] == 1 || $data['ma_trang_thai'] == 5  || $data['ma_trang_thai'] == 2) {
                ?>
                    <span class=" btn btn-success btn-circle position-relative border-0 text-white bg-gray-400" style="z-index: 1;">
                        <i class="fa-regular fa-circle"></i>
                    </span>
                    <div style="position: absolute; right: 2%; top: 15px; height: 10px;" class="w-100 bg-gray-400"></div>
                <?php
                }
                else {
                ?>
                    <span class=" btn btn-success btn-circle position-relative" style="z-index: 1;">
                        <i class="fa-regular fa-circle-check"></i>
                    </span>
                    <div style="position: absolute; right: 2%; top: 15px; height: 10px;" class="w-100 bg-success"></div>
                <?php
                }
                ?>
                    <!-- <span class=" btn btn-success btn-circle position-relative" style="z-index: 1;">
                        <i class="fa-regular fa-circle-check"></i>
                    </span>
                    <div style="position: absolute; right: 2%; top: 15px; height: 10px;" class="w-100 bg-success"></div> -->
                </li>
                <li class="position-relative list-unstyled d-flex justify-content-end" style="width: 33.333%;">
                <?php
                if($data['ma_trang_thai'] == 1 || $data['ma_trang_thai'] == 5  || $data['ma_trang_thai'] == 2 || $data['ma_trang_thai'] == 3) {
                ?>
                    <span class=" btn btn-success btn-circle position-relative border-0 text-white bg-gray-400" style="z-index: 1;">
                        <i class="fa-regular fa-circle"></i>
                    </span>
                    <div style="position: absolute; right: 2%; top: 15px; height: 10px;" class="w-100 bg-gray-400"></div>
                <?php
                }
                else {
                ?>
                    <span class=" btn btn-success btn-circle position-relative" style="z-index: 1;">
                        <i class="fa-regular fa-circle-check"></i>
                    </span>
                    <div style="position: absolute; right: 2%; top: 15px; height: 10px;" class="w-100 bg-success"></div>
                <?php
                }
                ?>
                    <!-- <span class=" btn btn-success btn-circle position-relative border-0 text-white bg-gray-400" style="z-index: 1;">
                        <i class="fa-regular fa-circle"></i>
                    </span>
                    <div style="position: absolute; right: 2%; top: 15px; height: 10px;" class="w-100 bg-gray-400"></div> -->
                </li>
            </ul>
            <div class="d-flex align-items-center justify-content-between" style="font-size: 46px;">
            
                <div 
                <?php
                if($data['ma_trang_thai'] == 5) {
                    echo "class='text-danger'";
                }
                else {
                    echo "class='text-success'";
                }
                ?>
                >
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
                <div <?php
                if($data['ma_trang_thai'] == 1 || $data['ma_trang_thai'] == 5) {
                    echo "class='text-gray-400 ml-4'";
                }
                else {
                    echo "class='text-success ml-4'";
                }
                ?> >
                    <i class="fa-solid fa-box-open"></i>
                </div>
                <div <?php
                if($data['ma_trang_thai'] == 1 || $data['ma_trang_thai'] == 5  || $data['ma_trang_thai'] == 2) {
                    echo "class='text-gray-400 ml-2'";
                }
                else {
                    echo "class='text-success ml-2'";
                }
                ?> >
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <div <?php
                if($data['ma_trang_thai'] == 1 || $data['ma_trang_thai'] == 5  || $data['ma_trang_thai'] == 2 || $data['ma_trang_thai'] == 3) {
                    echo "class='text-gray-400 ml-2'";
                }
                else {
                    echo "class='text-success ml-2'";
                }
                ?> >
                    <i class="fa-solid fa-house"></i>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <div class="w-50">
                    <p class="m-0">Người nhận: <span class="text-dark font-weight-bold"><?= $data['ten_nguoi_nhan'] ?></span></p>
                    <p class="m-0">Số điên thoại: <span class="text-dark font-weight-bold"><?= $data['sdt_nguoi_nhan'] ?></span></p>
                    <p class="m-0">Địa chỉ: <span class="text-dark font-weight-bold"><?= $data['dia_chi_nhan'] ?></span></p>
                    <p class="m-0">Ghi chú: <span class="text-dark font-weight-bold"><?= $data['ghi_chu'] ?></span></p>
                    <p class="m-0">Trạng thái: <span class="p-1 rounded font-weight-bold"
                    <?php
                        switch($data['ma_trang_thai']) {
                            case '5':
                                echo "style='color: #d62728;  background-color: rgba(214, 39, 40, 0.2);'";
                                break;
                            case '1':
                                echo "style='color: #ff7f0e;  background-color: rgba(255, 127, 14, 0.2);'";
                                break;
                            case '2':
                                echo "style='color: #f6c23e;  background-color: rgba(246, 194, 62, 0.2);'";
                                break;
                            case '3':
                                echo "style='color: #2ca02c;  background-color: rgba(44, 160, 44, 0.2);'";
                                break;
                            case '4':
                                echo "style='color: #1f77b4;  background-color: rgba(31, 119, 180, 0.2);'";
                                break;
                            case '8':
                                echo "style='color: #fff;  background-color: #1f77b4;'";
                                break;
                        }
                        ?>
                    ><?= $data['ten_trang_thai'] ?></span></p>
                    <!-- Button trigger modal -->
                    <button
                    <?php
                    if ($data['ma_trang_thai'] == 5 || $data['ma_trang_thai'] == 8 || $data['ma_trang_thai'] == 4) {
                        ?>
                            onclick="showMesssage(false, 'Trạng thái này không thể cập nhật')"
                        <?php
                    }
                    else {
                        ?>
                        data-toggle="modal" data-target="#exampleModalScrollable"
                        <?php
                    }
                    ?>
                    
                    type="button" class="btn btn-warning mt-3">
                        Cập nhật trang thái
                    </button>
                </div>
                <div class="w-30">
                    <div class="border-bottom" style="max-height: 175px; overflow: auto;">
                        <?php
                        foreach ($data['products'] as $item) {
                        ?>
                            <div class="d-flex align-items-center justify-content-between pb-2">
                                <div class="d-flex">
                                    <img src="<?= url_public ?>/images/products/<?= reset($item['hinhArr']) ?>" alt="" style="width: 80px; height: 80px; object-fit: cover;" class="border rounded">
                                    <div class="pl-2">
                                        <h6 class="font-weight-bold mb-1 text-success"><?= $item['ten_hh'] ?></h6>
                                        <p class="m-0"><?= $item['don_vi'] ?></p>
                                    </div>
                                </div>
                                <p class="m-0">x<span class="font-weight-bold text-dark"><?= $item['so_luong'] ?></span></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <h5 class="mb-0 mt-3">Tổng tiền: <span class="font-weight-bold text-success"><?= number_format($data['tong_tien']) ?> đ</span></h5>
                </div>

            </div>


                <!--  -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalScrollableTitle">Trạng thái</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?ctl=ad-update-trangthai" method="POST">
                    <div class="modal-body">
                        <input type="text" name='ma_dh' value="<?=$data['ma_dh']?>" class="d-none">
                    <select class="form-control" name='ma_trang_thai'>
                        <?php
                        foreach($listTrangThai as $item) {
                            ?>
                            <option <?php
                            if($data['ma_trang_thai']== 2 && $item['ma_trang_thai'] == 1) {
                                echo 'hidden';
                            }
                            else if ($data['ma_trang_thai']== 3 && ($item['ma_trang_thai'] == 1 || $item['ma_trang_thai'] == 2)) {
                                echo 'hidden';
                            }
                            else if ($data['ma_trang_thai']== 4 && ($item['ma_trang_thai'] == 1 || $item['ma_trang_thai'] == 2 || $item['ma_trang_thai'] == 3)) {
                                echo 'hidden';
                            }

                            if ($item['ma_trang_thai'] == 8) {
                                echo 'hidden';
                            }
                            if ($data['ma_trang_thai'] != 1 && $item['ma_trang_thai'] == 5) {
                                echo 'hidden';
                            }
                            if($data['ma_trang_thai'] == $item['ma_trang_thai']) echo ' selected';
                            ?> value="<?=$item['ma_trang_thai']?>"><?=$item['ten_trang_thai']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                        <button type="submit" class="btn btn-warning">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  -->
        </div>
    </div>

</div>