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
                <th class="!text-base md:!text-xl w-[12%] sm:table-cell hidden">Ảnh</th>
                <th class="!text-base md:!text-xl w-[22%]">Tên</th>
                <th class="!text-base md:!text-xl w-[10%]">Loại</th>
                <th class="!text-base md:!text-xl w-[10%] sm:table-cell hidden">Giá</th>
                <th class="!text-base md:!text-xl w-[13%]">Số lượng</th>
                <th class="!text-base md:!text-xl w-[17%] md:table-cell hidden">Tổng</th>
                <th class="!text-base md:!text-xl w-[15%]">Thao tác</th>
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
                <td class="sm:table-cell hidden sm:p-3 p-1 !text-base md:!text-xl"><img src="<?= url_public . '/images/products/' . reset($item['hinhArr']) ?>" alt=""></td>
                <td class="sm:p-3 p-1 !text-base md:!text-xl"><?=$item['ten_hh']?></td>
                <td class="sm:p-3 p-1 !text-base md:!text-xl"><?=$item['don_vi']?></td>
                <td class="sm:p-3 p-1 !text-base md:!text-xl sm:table-cell hidden"><?=number_format($item['don_gia'] - $item['giam_gia'], 0, ',', '.')?></td>
                <td class="relative sm:p-3 p-1 !text-base md:!text-xl"> 
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
                <td id="tong_tien_item_cart_<?=$item['ma_gh']?>" class="tong_tien_item md:table-cell hidden sm:p-3 p-1 !text-base md:!text-xl"><?=number_format($tongTienSp, 0, ",", ".")?> đ</td>
                <td class="sm:p-3 p-1 !text-base md:!text-xl">
                    <a href="?ctl=gh-delete&id=<?=$item['ma_gh']?>"><i class="fa-regular fa-trash-can"></i></a>
                </td>
            </tr> 
        <?php
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <!-- <td colspan="5">
                <h3>Tổng tiền</h3>
            </td>
            <td><span id="tong_tien"><?=number_format($tongDonHang, 0, ",", ".")?></span>đ</td>
            <td><button onclick="datHang('<?=$_SESSION['user']['ma_kh']?>')" href="<?=url_site?>/order/?ctl=order" class="btn btn__bg d-block mx-auto">Đặt Hàng</button></td> -->
            <!-- href="<?=url_site?>/order/?ctl=order" -->
        </tr>
       </tfoot>
    </table>
    <div class="container mx-auto p-0 mt-5">
        <div class="flex items-center justify-between sm:flex-row flex-col">
            <h3 class="font-semibold text-xl">Tổng tiền</h3>
            <div class="flex items-center">
                <div class="mr-3 font-semibold text-2xl">
                    <span id="tong_tien" class=""><?=number_format($tongDonHang, 0, ",", ".")?></span>đ
                </div>
                <button 
                onclick="datHang('<?=$_SESSION['user']['ma_kh']?>')"
                class="btn btn__bg d-block mx-auto">Đặt Hàng</button>
            </div>
        </div>
    </div>
    <!-- <form action="<?=url_site?>/order/?ctl=order" method="POST">
    </form> -->


</div>