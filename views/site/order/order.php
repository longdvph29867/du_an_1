
    <!-- banner_slide -->
    <section class="banner relative flex items-center justify-center h-40 w-full bg-cover bg-center border-t-2 border-gray-200">
        <img class="w-full h-full object-cover absolute  mix-blend-overlay" src="<?= url_public ?>/assets/images/breadcrumb-banner.webp" alt="">
        <div class="text-center text-black py-24">
            <h2 class="pb-5 text-4xl">Cửa hàng</h2>
            <p class="">Trang chủ / Đặt hàng</p>
        </div>
    </section>

    <!-- pay Details-->
    <form action="?ctl=order-insert" method="post" id="form-insert-order">
        <div class="container mx-auto grid md:grid-cols-2 sm:grid-cols-1 gap-10 mt-10">
            <div>
                <h2
                    class="text-[#333333] pb-4 border-b mb-8 font-bold border-solid border-[#ccc] text-xl">
                    Billing Details</h2>
                <div class="billing-form-wrap">
                    <form action="#">
                        <div class="flex flex-col mb-3">
                            <label for="ten_nguoi_nhan">Họ tên người nhận</label>
                            <input type="text" name="ten_nguoi_nhan" id="ten_nguoi_nhan" 
                            value="<?=$data['ten_nguoi_nhan']?>"
                            class="text-[#666] border border-gray-300 bg-[#f7f7f7] text-base px-3 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded">
                            <small class="min-h-[20px] text-sm text-red-500">
                            <?php
                                if(!empty($errors['ten_nguoi_nhan'])) {
                                    echo $errors['ten_nguoi_nhan'];
                                }
                            ?>
                            </small>
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="sdt">Số điện thoại người nhận</label>
                            <input type="text" name="sdt" id="sdt" 
                            value="<?=$data['sdt']?>"
                            class="text-[#666] border border-gray-300 bg-[#f7f7f7] text-base px-3 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded">
                            <small class="min-h-[20px] text-sm text-red-500">
                            <?php
                                if(!empty($errors['sdt'])) {
                                    echo $errors['sdt'];
                                }
                            ?>
                            </small>
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="dia_chi_nhan">Địa chỉ Nhận hàng</label>
                            <input type="text" name="dia_chi_nhan" id="dia_chi_nhan" 
                            value="<?php if(!empty($dia_chi_nhan)) echo $dia_chi_nhan; ?>"
                            class="text-[#666] border border-gray-300 bg-[#f7f7f7] text-base px-3 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded">
                            <small class="min-h-[20px] text-sm text-red-500">
                            <?php
                                if(!empty($errors['dia_chi_nhan'])) {
                                    echo $errors['dia_chi_nhan'];
                                }
                            ?>
                            </small>
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="">Đơn vị vận chuyển</label>
                            <select name="ma_van_chuyen" id="ma_van_chuyen" 
                            onchange="changeVanChuyen(<?=htmlspecialchars(json_encode($listVanChuyen), ENT_QUOTES, 'UTF-8')?>)"
                            class="text-[#666] border border-gray-300 bg-[#f7f7f7] text-base px-3 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded">
                                <option value="">---Chọn---</option>

                                <?php
                                foreach ($listVanChuyen as $item) {
                                ?>
                                    <option 
                                    <?php 
                                    if(!empty($ma_van_chuyen) && $ma_van_chuyen == $item['ma_van_chuyen']) {
                                        echo 'selected';
                                    } 
                                    ?>
                                    value="<?=$item['ma_van_chuyen']?>"><?=$item['ten_van_chuyen']?> - <?=$item['gia_van_chuyen']?>đ</option>
                                <?php
                                }
                                ?>
                            </select>
                            <small class="min-h-[20px] text-sm text-red-500">
                            <?php
                                if(!empty($errors['ma_van_chuyen'])) {
                                    echo $errors['ma_van_chuyen'];
                                }
                            ?>
                            </small>
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="ghi_chu">Ghi chú</label>
                            <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="5" placeholder="Nhập ghi chú..."
                            class="text-[#666] border border-gray-300 bg-[#f7f7f7] text-base px-3 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded"
                            ><?php if(!empty($ghi_chu)) echo $ghi_chu; ?></textarea>
                            <small class="min-h-[20px] text-sm text-red-500">
                            <?php
                                if(!empty($errors['ghi_chu'])) {
                                    echo $errors['ghi_chu'];
                                }
                            ?>
                            </small>
                        </div>
                    </form>
                </div>
            </div>
            <!-- order_summary -->
            <div>
                <h2 class="text-[#333333] pb-4 border-b mb-8 font-bold border-solid border-[#ccc] text-xl">
                    Billing Details
                </h2>
                <div>
                    <table class="table w-full">
                        <thead class="">
                            <tr>
                                <th class="w-2/3 border py-3 px-2">Sản phẩm</th>
                                <th class="w-1/3 border py-3 px-2">Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tongTien = 0;
                                foreach ($data['listProduct'] as $item) {
                                    $tongTienSP = ($item['don_gia'] - $item['giam_gia']) * $item['so_luong'];
                                    $tongTien += $tongTienSP;
                                ?>
                                <input type="text" name="ma_gh[]" value="<?=$item['ma_gh']?>" class="hidden">
                                <input type="text" name="ma_cthh[<?=$item['ma_cthh']?>]" value="<?=$item['so_luong']?>" class="hidden">
                                <tr>
                                    <td class="border py-3 px-2 font-normal">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-start">
                                                <div class="w-16 h-16 rounded" style="border: 1px solid #d9d9d9;">
                                                    <img class="h-full w-full object-cover rounded" src="<?= url_public . '/images/products/' . reset($item['hinhArr']) ?>" alt="">
                                                </div>
                                                <div class="pl-4 text-left">
                                                    <h4 class="text-[#62d2a2] "><?=$item['ten_hh']?></h4>
                                                    <p class="text-[#717171] text-xs"><?=$item['don_vi']?></p>
                                                </div>
                                            </div>
                                            <p class="text-xs text-[#717171]">x <span class="text-black text-base"><?=$item['so_luong']?></span></p>
                                        </div>
                                    </td>
                                    <td class="border py-3 px-2 font-normal text-center"><?=$tongTienSP?> đ</td>
                                </tr>
                                <?php
                                }
                                ?>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="border py-3 px-2 font-normal">Tổng tiền hàng</td>
                                <td class="border py-3 px-2 font-normal text-center"><strong><span id="tong-tien-sp"><?=$tongTien?></span> đ</strong></td>
                            </tr>
                            <tr>
                                <td class="border py-3 px-2 font-normal">Phí vận chuyển</td>
                                <td class="border py-3 px-2 font-normal text-center">
                                    <span id="phi-ship">0</span> đ
                                </td>
                            </tr>
                            <tr>
                                <td class="border py-3 px-2 font-semibold">Thành tiền</td>
                                <td class="border py-3 px-2 font-normal text-center text-xl text-[#62d2a2]">
                                    <strong><span id="thanh-toan"><?=$tongTien?></span> đ</strong>
                                    <input id="input-thanh-toan" class="hidden" type="text" name="thanh_toan" value="<?=$tongTien?>">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="mt-5">
                    <div class="grid grid-cols-2 gap-5">
                        <label class="relative flex items-center justify-center p-3 border border-[#62d2a2] rounded-xl overflow-hidden">
                            <img class="w-16 h-16" src="<?= url_public ?>/assets/images/cash-on-delivery.png" alt="">
                            <span class="pl-3">
                                Thanh Toán khi nhận hàng
                            </span>
                            <img
                            class="absolute top-0 right-0 w-10"
                            src="<?= url_public ?>/assets/images/img-check.png" alt="">
                        </label>
                        <label class="relative flex items-center justify-center p-3 border border-gray-300 rounded-xl overflow-hidden">
                            <img class="w-16 h-16" src="<?= url_public ?>/assets/images/logo VNPAY-02.png" alt="">
                            <span class="pl-3">
                                Thanh Toán Online
                            </span>
                            <div class="absolute w-full h-full top-0 left-0 bg-gray-500/80 text-white/80 flex items-center justify-center pt-8">
                                Chức năng đang cập nhật...
                            </div>
                        </label>
                    </div>
                </div>
                <div class="mt-5">
                    <button class="text-white text-xl rounded-md py-2 px-6 border border-[#62d2a2] bg-[#62d2a2] hover:bg-white hover:text-[#62d2a2] duration-300">
                        Đặt hàng
                    </button>
                </div>
            </div>
        </div>
    </form>
