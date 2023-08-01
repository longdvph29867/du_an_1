<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật loại</h1>
    <div>
        <a href="?ctl=ad-list" class="btn btn-primary">Danh sách</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="bg-white p-5 shadow rounded-xl">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h4 class="text-dark">Mã đơn hàng: <span><?=$data['ma_dh']?></span></h4>
                <div>
                    <p class="m-0 text-right">Ngày đặt hàng: <span class="text-dark font-weight-bold"><?=$data['ngay_dat']?></span></p>
                    <p class="m-0 text-right">Đơn vị vận chuyển: <span class="text-dark font-weight-bold"><?=$data['ten_van_chuyen']?></span></p>
                </div>
            </div>
            <ul class="d-flex justify-content-between mx-0 mt-0 mb-2 px-0 pt-0 pb-2">
                <li class="position-relative list-unstyled" style="width: 33.333%;">
                    <span class="btn btn-success btn-circle position-relative" style="z-index: 1;">
                        <i class="fa-regular fa-circle-check"></i>
                    </span>
                    <div style="position: absolute; left: 1%; top: 15px; height: 10px;" class="w-100 bg-success"></div>
                </li>
                <li class="position-relative list-unstyled" style="width: 33.333%;">
                    <span class="btn btn-success btn-circle position-relative" style="z-index: 1;">
                        <i class="fa-regular fa-circle-check"></i>
                    </span>
                    <div style="position: absolute; left: 1%; top: 15px; height: 10px;" class="w-100 bg-success"></div>
                </li>
                <li class="position-relative list-unstyled" style="width: 33.333%;">
                    <span class="btn btn-success btn-circle position-relative" style="z-index: 1;">
                        <i class="fa-regular fa-circle-check"></i>
                    </span>
                    <div style="position: absolute; left: 1%; top: 15px; height: 10px;" class="w-100 bg-gray-400"></div>
                </li>
                <li style="list-style: none; width: 40px;">
                    <span class="btn btn-success btn-circle position-relative border-0 text-white bg-gray-400" style="z-index: 1;">
                        <i class="fa-regular fa-circle"></i>
                    </span>
                </li>
            </ul>
            <div class="d-flex align-items-center justify-content-between" style="font-size: 46px;">
                <div class="text-success">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
                <div class="text-success ml-4">
                    <i class="fa-solid fa-box-open"></i>
                </div>
                <div class="text-success ml-2">
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <div class="text-gray-400 ml-2">
                    <i class="fa-solid fa-house"></i>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <div class="w-50">
                    <p class="m-0">Người nhận: <span class="text-dark font-weight-bold"><?=$data['ten_nguoi_nhan']?></span></p>
                    <p class="m-0">Số điên thoại: <span class="text-dark font-weight-bold"><?=$data['sdt_nguoi_nhan']?></span></p>
                    <p class="m-0">Địa chỉ: <span class="text-dark font-weight-bold"><?=$data['dia_chi_nhan']?></span></p>
                    <p class="m-0">Ghi chú: <span class="text-dark font-weight-bold"><?=$data['ghi_chu']?></span></p>
                    <p class="m-0">Trạng thái: <span class="text-dark font-weight-bold"><?=$data['ten_trang_thai']?></span></p>
                </div>
                <div class="w-30">
                    <div class="border-bottom" style="max-height: 175px; overflow: auto;">
                        <?php
                            foreach ($data['products'] as $item) {
                            ?>
                                <div class="d-flex align-items-center justify-content-between pb-2">
                                    <div class="d-flex">
                                        <img src="<?= url_public?>/images/products/<?=reset($item['hinhArr'])?>" alt="" style="width: 80px; height: 80px; object-fit: cover;" class="border rounded">
                                        <div class="pl-2">
                                            <h6 class="font-weight-bold mb-1 text-success"><?=$item['ten_hh']?></h6>
                                            <p class="m-0"><?=$item['don_vi']?></p>
                                        </div>
                                    </div>
                                    <p class="m-0">x<span class="font-weight-bold text-dark"><?=$item['so_luong']?></span></p>
                                </div>
                            <?php
                            }
                        ?>
                    </div>
                    <h5 class="mb-0 mt-3">Tổng tiền: <span class="font-weight-bold text-success"><?=number_format($data['tong_tien'])?> đ</span></h5>
                </div>

            </div>
        </div>
    </div>
    <form action="?ctl=loai-update&ma_loai=<?= $data['ma_dh'] ?>" method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">
    1
    </form>
</div>