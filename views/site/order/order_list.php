<h3 class="text-2xl font-['Berkshire_Swash'] mb-4">Danh sách đơn hàng</h3>
<!--  -->
<div class="">
    <?php
    foreach ($orders as $order) {
    ?>
        <div class="item shadow-md rounded p-6 mb-6 bg-[#f8f8f8]">
            <?php
            foreach ($order['products'] as $product) {
            ?>
                <div class="flex justify-between items-center mb-2">
                    <div class="flex">
                        <div class="border-gray-400 mr-3" style="border-width: 1px;">
                            <img class="w-20 h-20 object-cover" src="<?=url_public."/images/products/$product[hinh]"?>" alt="">
                        </div>
                        <div>
                            <h3 class="text-lg"><?=$product['ten_hh']?></h3>
                            <p class="normal-case">x <span class="text-xl"><?=$product['so_luong']?></span></p>
                        </div>
                    </div>
                    <p class="normal-case">
                        <span class="line-through">₫<?=number_format($product['don_gia'])?></span>
                        <span class="text-lg text-[#62d2a2]">₫<?=number_format($product['don_gia'] - $product['giam_gia'])?></span>
                    </p>
                </div>
                <div class=" h-[1px] bg-gray-300 my-2"></div>
            <?php
            }
            ?>

            <div class="flex justify-between items-end">
                <div class="text-[#62d2a2]">
                    <i class="fa-solid fa-truck"></i>
                    <span><?=$order['ten_trang_thai']?></span>
                </div>
                <div>
                    <div class="pb-4 text-right">
                        <i class="fa-solid fa-file-invoice-dollar text-[#62d2a2]"></i>
                        <span>Thành tiền: </span>
                        <span class="text-2xl text-[#62d2a2] font-semibold">₫130.169</span>
                    </div>
                    <div class="flex space-x-2">
                        <a href="#" class="btn1 block text-center rounded min-w-[150px] py-2" style="border-width: 1px;">Chi tiết</a>
                        <a href="#" class="disabled-link btn2 block text-center rounded min-w-[150px] py-2" style="border-width: 1px;">Huỷ đơn hàng</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>