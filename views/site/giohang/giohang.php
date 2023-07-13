<div class="giohang">
        <table>
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
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
                $tongTienSp = $item['don_gia']*$item['so_luong'];
                $tongDonHang += $tongTienSp;
            ?>
                <tr>
                    <td><img src="<?= url_public . '/images/products/' . $item['hinh'] ?>" alt=""></td>
                    <td><?=$item['ten_hh']?></td>
                    <td><?=$item['don_gia']?></td>
                    <td> 
                        <a href="">
                            <i class="fa-solid fa-minus"></i>
                        </a>
                        <span><?=$item['so_luong']?></span>
                        <i class="fa-solid fa-plus"></i>
                    </td>
                    <td><?=number_format($tongTienSp)?></td>
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
                <td colspan=4>
                    <h3>Cart Totals</h3>
                </td>
                <td>$<?=number_format($tongDonHang)?></td>
                <td><a href="checkout.html" class="btn btn__bg d-block">Proceed To Checkout</a></td>
            </tr>
           </tfoot>
        </table>
</div>