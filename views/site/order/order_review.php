<h3 class="text-2xl font-['Berkshire_Swash'] mb-4">Đánh giá đơn hàng</h3>
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
        <form action="?ctl=order-review-insert&ma_dh=<?= $orderDetail["ma_dh"] ?>" method="post" id="insert_review">
            <?php
            foreach ($orderDetail['products'] as $item) {
            ?>
                <div class="flex justify-between items-center mb-2">
                    <div class="flex">
                        <div class="border-gray-400 mr-3" style="border-width: 1px;">
                            <img class="w-20 h-20 object-cover" src="<?= url_public . "/images/products/$item[hinh]" ?>" alt="">
                        </div>
                        <div>
                            <h3 class="text-lg"><?= $item['ten_hh'] ?></h3>
                            <p class="normal-case">x <span class="text-xl"><?= $item['so_luong'] ?></span></p>
                        </div>
                    </div>
                    <p class="normal-case">
                        <span class="line-through">₫<?= number_format($item['don_gia']) ?></span>
                        <span class="text-lg text-[#62d2a2]">₫<?= number_format($item['don_gia'] - $item['giam_gia']) ?></span>
                    </p>
                </div>
                <div class="flex">
                    <div class="w-1/4 pr-2">
                        <select name="rating[<?= $item['ma_hh'] ?>]" id="rating" class="block w-full min-h-[48px] bg-[#f3f6f5] text-base p-3 outline-none">
                            <option hidden value="">---Chose---</option>
                            <option value="5">Rất tốt</option>
                            <option value="4">Tốt</option>
                            <option value="3">Trung bình</option>
                            <option value="2">Tệ</option>
                            <option value="1">Rất tệ</option>
                        </select>
                        <small class=" text-sm text-red-500">
                            <?php
                            if (!empty($errors['rating'][$item['ma_hh']])) {
                                echo $errors['rating'][$item['ma_hh']];
                            }
                            ?>
                        </small>
                    </div>
                    <div class="flex-grow">
                        <input name="comment[<?= $item['ma_hh'] ?>]" id="comment" type="text" class="block w-full bg-[#f3f6f5] text-base p-3 outline-none" placeholder="Nội dung...">
                        <small class="text-sm text-red-500">
                            <?php
                            if (!empty($errors['comment'][$item['ma_hh']])) {
                                echo $errors['comment'][$item['ma_hh']];
                            }
                            ?>
                        </small>
                    </div>
                </div>
                <div class=" h-[1px] bg-gray-300 my-2"></div>
            <?php
            }
            ?>
            <div>
                <button class="btn1 block text-center rounded min-w-[150px] py-2" style="border-width: 1px;">Gửi đánh giá</button>
            </div>
        </form>

    </div>

</div>