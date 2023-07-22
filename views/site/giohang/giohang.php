<div class="giohang mt-3">
        <table class="container">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Loại</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Thao tác</th>
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
                    <td><?=$item['don_gia'] - $item['giam_gia']?></td>
                    <td> 
                        <div class="flex h-full justify-between md:flex-row flex-col">
                            <button id="giam_so_luong_<?=$item['ma_gh']?>" onclick="updateCartItem(<?=$item['ma_gh']?>, -1)"
                            class="<?php if($item['so_luong'] < 2) echo 'text-gray-400'?>"
                            <?php if($item['so_luong'] < 2) echo "disabled='true'"?>
                            >
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <span id="quantity_item_cart_<?=$item['ma_gh']?>"><?=$item['so_luong']?></span>
                            <button onclick="updateCartItem(<?=$item['ma_gh']?>, 1)">
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
                <td><a href="checkout.html" class="btn btn__bg d-block">Đặt Hàng</a></td>
            </tr>
           </tfoot>
        </table>
</div>