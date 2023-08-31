<h3 class="text-2xl mb-4">Danh sách đơn hàng</h3>
<!--  -->
<div class="">
    <?php
    // echo "<pre>";
    // print_r($orders);
    // echo "</pre>";
    foreach ($orders as $order) {
    ?>
        <div class="item shadow-md rounded p-6 mb-6 bg-[#f8f8f8]">
            <?php
            foreach ($order['products'] as $product) {
            ?>
                <a href="<?=url_site . '/chitiet/?ma_hh=' . $product['ma_hh']?>">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex">
                            <div class="border-gray-400 mr-3" style="border-width: 1px;">
                                <img class="w-20 h-20 object-cover" src="<?= url_public . "/images/products/". reset($product['hinhArr']) ?>" alt="">
                            </div>
                            <div>
                                <h3 class="text-lg"><?= $product['ten_hh'] ?></h3>
                                <p class="normal-case">Số lượng: <span class="text-xl"><?= $product['so_luong'] ?> x </span> <?= $product['don_vi'] ?></p>
                            </div>
                        </div>
                        <p class="normal-case">
                            <span class="line-through">₫<?= number_format($product['don_gia'], 0, ',', '.') ?></span>
                            <span class="text-lg text-[#62d2a2]">₫<?= number_format($product['don_gia'] - $product['giam_gia'], 0, ',', '.') ?></span>
                        </p>
                    </div>
                </a>
                <div class=" h-[1px] bg-gray-300 my-2"></div>
            <?php
            }
            ?>

            <div class="flex justify-between items-end">
                <div class="text-[#62d2a2]">
                    <i class="fa-solid fa-truck"></i>
                    <span><?= $order['ten_trang_thai'] ?></span>
                </div>
                <div>
                    <div class="pb-4 text-right">
                        <i class="fa-solid fa-file-invoice-dollar text-[#62d2a2]"></i>
                        <span>Thành tiền: </span>
                        <span class="text-2xl text-[#62d2a2] font-semibold">₫<?= number_format($order['tong_tien'], 0, ',', '.') ?></span>
                    </div>
                    <div class="flex space-x-2">
                        <a href="?ctl=order-detail&ma_dh=<?= $order['ma_dh'] ?>" class="btn1 block text-center rounded min-w-[150px] py-2" style="border-width: 1px;">Chi tiết</a>
                        <?php
                        if ($order['ma_trang_thai'] == 8) {
                        ?>
                            <a href='?ctl=order-review&ma_dh=<?= $order['ma_dh'] ?>' class='<?php if (!empty($order['danh_gia_don_hang'])) echo 'disabled-link'; ?> btn1 block text-center rounded min-w-[150px] py-2' style='border-width: 1px;'><?php if (!empty($order['danh_gia_don_hang'])) echo 'Đã'; ?> Đánh giá</a>
                        <?php
                        }
                        if ($order['ma_trang_thai'] == 4) {
                        ?>
                            <a href='?ctl=order-da-nhan-hang&ma_dh=<?= $order['ma_dh'] ?>' class='<?php if (!empty($order['danh_gia_don_hang'])) echo 'disabled-link'; ?> btn1 block text-center rounded min-w-[150px] py-2' style='border-width: 1px;'>Đã nhận được hàng</a>
                        <?php
                        }
                        ?>

                        <a href="?ctl=order-cancel&ma_dh=<?= $order['ma_dh'] ?>" class=" <?php if ($order['ma_trang_thai'] != 1) echo 'disabled-link'; ?> btn2 block text-center rounded min-w-[150px] py-2" style="border-width: 1px;">Huỷ đơn hàng</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>