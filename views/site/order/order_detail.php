<h3 class="text-2xl mb-4">Chi tiết đơn hàng</h3>
<!--  -->

<div class="shadow">
    <div class="p-4 flex justify-between items-center" style="border-bottom: 1px dotted rgba(0,0,0,.09);">
        <div>
            <a href="?ctl=order-list">
                <i class="fa-solid fa-chevron-left"></i>
                <span>Trở về</span>
            </a>
        </div>
        <div>
            <span>MÃ ĐƠN HÀNG: <?= $orderDetail['ma_dh'] ?></span>
            <span class="mx-1">|</span>
            <span class="text-[#62d2a2]"><?= $orderDetail['ten_trang_thai'] ?></span>
        </div>
    </div>

    <div class="p-4">

        <?php
        foreach ($orderDetail['products'] as $product) {

        ?>
            <div class="flex justify-between items-center mb-2">
                <div class="flex">
                    <div class="border-gray-400 mr-3" style="border-width: 1px;">
                        <img class="w-20 h-20 object-cover" src="<?=url_public."/images/products/". reset($product['hinhArr'])?>" alt="">
                    </div>
                    <div>
                        <h3 class="text-lg"><?=$product['ten_hh']?></h3>
                        <p class="normal-case">Số lượng: <span class="text-xl"><?=$product['so_luong']?> x </span> <?=$product['don_vi']?></p>
                    </div>
                </div>
                <p class="normal-case">
                    <span class="line-through">₫<?=number_format($product['don_gia'], 0, ',', '.')?></span>
                    <span class="text-lg text-[#62d2a2]">₫<?=number_format($product['don_gia'] - $product['giam_gia'], 0, ',', '.')?></span>
                </p>
            </div>
            <div class=" h-[1px] bg-gray-300 my-2"></div>

        <?php
        }

        ?>


    </div>

    <div class="h-1" style="background-image: repeating-linear-gradient(45deg,#6fa6d6,#6fa6d6 33px,transparent 0,transparent 41px,#f18d9b 0,#f18d9b 74px,transparent 0,transparent 82px);"></div>

    <div class="p-5">
        <div class="flex justify-between">
            <h3 class="font-semibold text-xl">Địa Chỉ Nhận Hàng</h3>
            <p class="text-sm text-gray-500">Đơn vị vận chuyển: <span class="text-[#62d2a2]"><?= $orderDetail['ten_van_chuyen'] ?></span></p>
        </div>
        <div class="flex pt-4">
            <div class="w-2/5 pr-5 border-gray-300" style="border-right-width: 1px;">
                <div class="flex flex-col justify-between h-full">
                    <div>
                        <h4 class="font-medium"><?= $orderDetail['ten_nguoi_nhan'] ?></h4>
                        <div class="text-sm text-gray-500 space-y-1 normal-case">
                            <p>
                                <?= $orderDetail['sdt_nguoi_nhan'] ?>
                            </p>
                            <p>
                                <?= $orderDetail['dia_chi_nhan'] ?>
                            </p>
                            <p>
                                Ghi chú: <?= $orderDetail['ghi_chu'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="text-[#62d2a2]">
                        <?= $orderDetail['ten_trang_thai'] ?>
                    </div>
                </div>
            </div>
            <div class="w-3/5 pl-5 text-sm text-gray-500 normal-case">
                <div class="flex justify-between items-center py-3 border-gray-200" style="border-bottom-width: 1px;">
                    <p>Tổng tiền hàng</p>
                    <p>₫<?= number_format($orderDetail['tong_tien'] - $orderDetail['gia_van_chuyen'], 0, ',', '.') ?></p>
                </div>
                <div class="flex justify-between items-center py-3 border-gray-200" style="border-bottom-width: 1px;">
                    <p>Phí vận chuyển</p>
                    <p>₫<?= number_format($orderDetail['gia_van_chuyen'], 0, ',', '.') ?></p>
                </div>
                <div class="flex justify-between items-center py-2 border-gray-300" style="border-bottom-width: 1px;">
                    <p>Thành tiền</p>
                    <p class="text-2xl text-[#62d2a2] font-semibold">₫<?= number_format(($orderDetail['tong_tien'] + $orderDetail['gia_van_chuyen']) - $orderDetail['gia_van_chuyen'], 0, ',', '.') ?></p>
                </div>
                <div class="flex justify-between items-center py-3 border-gray-200">
                    <p>
                        <i class="fa-solid fa-file-invoice-dollar text-[#62d2a2]"></i>
                        Phương thức Thanh toán
                    </p>
                    <p>Thanh toán tại nhà</p>
                </div>
            </div>
        </div>
    </div>
</div>