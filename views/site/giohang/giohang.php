<section class="banner relative flex items-center justify-center h-40 w-full bg-cover bg-center border-t-2 border-gray-200">
    <img class="w-full h-full object-cover absolute  mix-blend-overlay" src="<?= url_public ?>/assets/images/breadcrumb-banner.webp" alt="">
    <div class="text-center text-black py-24">
        <h2 class="pb-5 text-4xl">Cửa hàng</h2>
        <p class="">Trang chủ / Giỏ hàng</p>
        </div>
</section>
<div class="giohang mt-3">
    <table class="container">
        <thead>
            <tr>
                <th class="w-[12%]">Ảnh</th>
                <th class="w-[22%]">Tên</th>
                <th class="w-[10%]">Loại</th>
                <th class="w-[10%]">Giá</th>
                <th class="w-[13%]">Số lượng</th>
                <th class="w-[17%]">Tổng</th>
                <th class="w-[15%]">Thao tác</th>
            </tr>
        </thead>
       <tbody>
       <?php
        $tongDonHang = 0;
        foreach ($giohang as $item) {
            $tongTienSp = ($item['don_gia'] - $item['giam_gia'])*$item['so_luong'];
            $tongDonHang += $tongTienSp;
        ?>
            <tr>
                <td><img src="<?= url_public . '/images/products/' . reset($item['hinhArr']) ?>" alt=""></td>
                <td><?=$item['ten_hh']?></td>
                <td><?=$item['don_vi']?></td>
                <td><?=number_format($item['don_gia'] - $item['giam_gia'])?></td>
                <td class="relative"> 
                    <div class="flex h-full justify-between md:flex-row flex-col">
                        <button type="button" id="giam_so_luong_<?=$item['ma_gh']?>" onclick="updateCartItem(<?=$item['ma_gh']?>, -1)"
                        class="<?php if($item['so_luong'] < 2) echo 'text-gray-400'?>"
                        <?php if($item['so_luong'] < 2) echo "disabled='true'"?>
                        >
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <span id="quantity_item_cart_<?=$item['ma_gh']?>"><?=$item['so_luong']?></span>
                        <button type="button" id="tang_so_luong_<?=$item['ma_gh']?>" onclick="updateCartItem(<?=$item['ma_gh']?>, 1)" <?php if($item['so_luong'] >= $item['so_luong_kho']) echo "disabled class='text-gray-400'"?>>
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <?php
                    if($item['so_luong'] > $item['so_luong_kho']) {
                        if ($item['so_luong_kho'] != 0) {
                        ?>
                            <p id="messQuantity_<?=$item['ma_gh']?>" class="text-red-500 text-sm absolute right-2 bottom-2">Chỉ còn <?=$item['so_luong_kho']?> sp</p>
                        <?php
                        }
                        else {
                        ?>
                            <p id="messQuantity_<?=$item['ma_gh']?>" class="text-red-500 text-sm absolute right-2 bottom-2">Hết hàng</p>
                        <?php
                        }
                    }
                    ?>

                </td>
                <td id="tong_tien_item_cart_<?=$item['ma_gh']?>" class="tong_tien_item"><?=number_format($tongTienSp, 0, ",", ".")?> đ</td>
                <td>
                    <a href="?ctl=gh-delete&id=<?=$item['ma_gh']?>"><i class="fa-regular fa-trash-can"></i></a>
                </td>
            </tr> 
        <?php
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan=5>
                <h3>Tổng tiền</h3>
            </td>
            <td><span id="tong_tien"><?=number_format($tongDonHang, 0, ",", ".")?></span>đ</td>
            <td><button onclick="datHang('<?=$_SESSION['user']['ma_kh']?>')" href="<?=url_site?>/order/?ctl=order" class="btn btn__bg d-block mx-auto">Đặt Hàng</button></td>
            <!-- href="<?=url_site?>/order/?ctl=order" -->
        </tr>
       </tfoot>
    </table>
    <!-- <form action="<?=url_site?>/order/?ctl=order" method="POST">
    </form> -->


</div>