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
                $tongTienSp = $item['don_gia']*$item['so_luong'];
                $tongDonHang += $tongTienSp;
            ?>
                <tr>
                    <td class="w-[]"><img src="<?= url_public . '/images/products/' . reset($item['hinhArr']) ?>" alt=""></td>
                    <td class="w"><?=$item['ten_hh']?></td>
                    <td class="w"><?=$item['don_vi']?></td>
                    <td class="w"><?=$item['don_gia']?></td>
                    <td class="w "> 
                        <div class="flex h-full justify-between md:flex-row flex-col">
                            <button>
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <span><?=$item['so_luong']?></span>
                            <button>
                                <i class="fa-solid fa-plus"></i>
                            </button>

                        </div>
                    </td>
                    <td class="w"><?=number_format($tongTienSp)?></td>
                    <td class="w">
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
                    <h3>Tỏng tiền</h3>
                </td>
                <td>$<?=number_format($tongDonHang)?></td>
                <td><a href="checkout.html" class="btn btn__bg d-block">Đặt Hàng</a></td>
            </tr>
           </tfoot>
        </table>
</div>