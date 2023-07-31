<div class="giohang mt-3">
    <form action="<?=url_site?>/order/?ctl=order" method="POST">
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
                    <input type="text" name="ma_gh[]" value="<?=$item['ma_gh']?>" class="hidden" readonly>
                    <td><img src="<?= url_public . '/images/products/' . reset($item['hinhArr']) ?>" alt=""></td>
                    <td><?=$item['ten_hh']?></td>
                    <td><?=$item['don_vi']?></td>
                    <td><?=$item['don_gia'] - $item['giam_gia']?></td>
                    <td> 
                        <div class="flex h-full justify-between md:flex-row flex-col">
                            <button type="button" id="giam_so_luong_<?=$item['ma_gh']?>" onclick="updateCartItem(<?=$item['ma_gh']?>, -1)"
                            class="<?php if($item['so_luong'] < 2) echo 'text-gray-400'?>"
                            <?php if($item['so_luong'] < 2) echo "disabled='true'"?>
                            >
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <span id="quantity_item_cart_<?=$item['ma_gh']?>"><?=$item['so_luong']?></span>
                            <button type="button" onclick="updateCartItem(<?=$item['ma_gh']?>, 1)">
                                <i class="fa-solid fa-plus"></i>
                            </button>

                        </div>
                    </td>
                    <td id="tong_tien_item_cart_<?=$item['ma_gh']?>" class="tong_tien_item"><?=$tongTienSp?></td>
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
                <td id="tong_tien">$ <?=$tongDonHang?></td>
                <td><button class="btn btn__bg d-block mx-auto">Đặt Hàng</button></td>
            </tr>
           </tfoot>
        </table>
    </form>
</div>