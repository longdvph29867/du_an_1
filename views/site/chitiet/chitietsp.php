    <!-- banner_slide -->
    <?php
      $giaHangHoa=reset($hanghoact['chi_tiet_sp']);
      $max=$giaHangHoa['don_gia'];
      $min=$giaHangHoa['don_gia'];
      $tong_so_luong=0;
    print_r($hanghoact['chi_tiet_sp']);
    foreach($hanghoact['chi_tiet_sp'] as $item){
     if($max<$item['don_gia']){
        $max=$item['don_gia'];
     }
     if($min>$item['don_gia']){
        $min=$item['don_gia'];
     }
     $tong_so_luong+=$item['so_luong'];
    }
    ?>
    <section class="banner  relative bg-gradient-to-tr  from-green-500 to-red-400 hover:bg-gradient-to-tl hover:from-red-400 hover:to-green-300 transition-all  duration-300 flex items-center justify-center h-40 w-full bg-cover bg-center">
        <img class="w-full h-full object-cover absolute  mix-blend-overlay" src="<?=url_public?>/assets/images/banner11.jpeg" alt="">
    <div class="text-center text-black py-24">
        <h2 class="pb-5  font-['Berkshire_Swash'] text-4xl">Cửa hàng</h2>
        <p class="">Trang chủ / Chi tiết sản phẩm</p>
    </div>
     </section>
     <!-- detail_description -->
      <section class="detail w-[90%] py-14  flex gap-10  mx-auto">
            <div class="big-img w-[40%]  mx-auto overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
                <img class="w-full h-full object-cover cursor-pointer hover:opacity-90 transform hover:scale-110 transition-all duration-500" src="<?= url_public.'/images/products/'.reset($hanghoact['hinhArr']) ?>" alt="">
                
            </div>

         <div class=" font-['Raleway'] w-[60%]  py-3 sm:text-center md:text-left ">
            <h3 class="text-3xl font-bold hover:text-[#62d2a2]"><?= $hanghoact['ten_hh'] ?></h3>
            <div class="md:w-28 md:ml-2 h-[1px] bg-gray-300 my-3 md:duration-300  sm:w-[500px] sm:mx-auto"></div>
            
            <p class="don_gia_ct text-[#62d2a2] text-xl font-bold"><?=number_format($min)?> - <?=number_format($max) ?></p>
            <div class="text-[14px]"> <span class="line-through text-gray-400"><?=number_format( $giaHangHoa['don_gia'])?>đ/1kg   </span><?=discountPrecent ( $giaHangHoa['don_gia'], $giaHangHoa['giam_gia']) ?>%</div>
            <p class="py-5 text-[#666] font-[16px]"><?= $hanghoact['mo_ta'] ?>
                                </p>
                                
          <div class="buttons_group">
            <h3 class="title_btn text-[15px] font-bold my-3">Khối lượng:</h3>
          <div class="buttons mt-5 mb-5 flex gap-[10px]">
            <?php
            foreach($hanghoact['chi_tiet_sp'] as $item){
                ?>
            
            <label onclick="chitiet(<?= $item['don_gia']?>,<?= $item['so_luong']?>)" class=" group  cursor-pointer py-2 text-[rgb(36, 36, 36)] relative rounded border-[1px] border-solid bg-[#F5F5F5]  hover:border-[#62d2a2] ">
         <span class="text-center px-2"><?=$item['don_vi']?></span>
         <img class=" absolute hidden group-hover:inline-block right-[-2px]  top-[-2px] w-[20px] h-[20px]" src="../chitiet/tich.png" alt="Selected">
         <input type="radio" name="don_vi" class="appearance-none">
         </label>
             <?php 
            }
             ?>
           
            </div>
          </div>
   
                          
                                <div class=" sm:w-[70%] md:w-[90%] md:mx-2 sm:mx-auto sm:gap-4 flex md:gap-2 ">
                                  <form action="" class=" sm:gap-6 flex md:gap-2">
                                    <input type="number" value="1" min="1" max="200"
                                     class="border-[1px] border-[#62d2a2] rounded-lg px-2 py-1 w-16 h-10">
                                     <button class=" text-white border-[1px] hover:text-[#62d2a2] hover:bg-white  duration-300 font-bold border-[#62d2a2] rounded-full h-10 p-3  py-1 bg-[#62d2a2]">Thêm vào giỏ hàng</button>
                                  </form>
                                  <a href="#" class=" block w-10 h-10 border-gray-300 border-[1px] rounded-full text-gray-500  hover:bg-[#62d2a2] hover:text-white hover:border-[#62d2a2] duration-300  flex justify-center items-center ">
                                  <i class="fa-regular fa-heart"></i>
                                  </a>
                                  <a href="#" class=" block w-10 h-10 border-gray-300 border-[1px] rounded-full text-gray-500  hover:bg-[#62d2a2] hover:text-white hover:border-[#62d2a2] duration-300  flex justify-center items-center ">
                                    <i class="fa-solid fa-shuffle"></i>
                                  </a>
                                
                                </div>
            <h3 class="text-[15px] font-bold my-3">
                Lượt xem: <span class="text-[#62d2a2] text-[18px]  font-semibold"><?= $hanghoact['so_luot_xem'] ?></span>
            </h3>
            <h3 class="text-[15px] font-bold my-3">
                Số lượng: <span class="text-[#62d2a2] font-semibold text-[18px] tong_so_luong"><?= $tong_so_luong ?></span>
            </h3>
            <div class=" sm:w-[60%] md:mx-0 sm:mx-auto flex gap-2 items-center  ">
                <h5 class="font-bold"> Chia sẻ: </h5>
                <div class="flex items-center md:gap-2 sm:gap-6">
                    <a href="#" class=" block w-10 h-10 border-gray-300 border-[1px] rounded-full text-gray-500  hover:bg-[#62d2a2] hover:text-white hover:border-[#62d2a2] duration-300  flex justify-center items-center ">
                        <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class=" block w-10 h-10 border-gray-300 border-[1px] rounded-full text-gray-500  hover:bg-[#62d2a2] hover:text-white hover:border-[#62d2a2] duration-300  flex justify-center items-center ">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    <a href="#" class=" block w-10 h-10 border-gray-300 border-[1px] rounded-full text-gray-500  hover:bg-[#62d2a2] hover:text-white hover:border-[#62d2a2] duration-300  flex justify-center items-center ">
                        <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="#" class=" block w-10 h-10 border-gray-300 border-[1px] rounded-full text-gray-500  hover:bg-[#62d2a2] hover:text-white hover:border-[#62d2a2] duration-300  flex justify-center items-center ">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                </div>
            </div>
        </div>
      </section>
   <!-- comments -->

<!-- comment -->
<section class="comment">
        <div class="container mx-auto">
            <div class="relative">
                <h3 class="w-72 text-white text-xl bg-[#62d2a2] px-4 py-3 rounded-tr-2xl">Bình Luận(32)</h3>
                <!-- 123 -->
                <div class="px-12 py-8 border-[#62d2a2] space-y-6 max-h-[600px] overflow-y-scroll"
                    style="border-width: 1px;">
   <?php  
 
    foreach($binhluan as $bl){
   
        ?>
            <div class="flex items-start flex-col sm:flex-row sm:space-x-3 space-y-3 sm:space-y-0">
                        <img class="w-16" src="<?=url_public.'/images/users/'.$bl['hinh']?>" alt="">
                        <div class="px-6 py-5 border-gray-300 w-full" style="border-width: 1px;">
                            <p class="text-lg font-bold"> <?=$bl['ho_ten'] ?> -
                                <span class="text-sm font-normal"><?=$bl['ngay_bl'] ?></span>
                            </p>
                            <p>
                            <?=$bl['noi_dung'] ?>
                            </p>
                        </div>
                    </div>
                    
  <?php 
   }
   ?>
                
                </div>
                <div class="absolute bottom-0 left-0 w-full px-12 py-3  bg-green-100 border-[#62d2a2] border-t-transparent"
                    style="border-width: 1px;">
                    <h3 class="font-medium">Vui lòng đăng nhập để bình luận về sản phẩm này</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- rating stars-->
    <section class="rating_stars mt-10">
        <div class="container mx-auto">
            <div class="relative">
                <h3 class="w-72 text-white text-xl bg-[#62d2a2] px-4 py-3 rounded-tr-2xl">Đánh giá(32)</h3>
                <!-- 123 -->
                <div class="px-12 py-8 border-[#62d2a2] space-y-6 max-h-[600px] overflow-y-scroll"
                    style="border-width: 1px;">
   <?php  

  
    foreach($danhgia as $dg){
    
        ?>
            <div class="flex items-start flex-col sm:flex-row sm:space-x-3 space-y-3 sm:space-y-0">
                        <img class="w-16" src="<?=url_public.'/images/users/'.$dg['hinh']?>" alt="">
                        <div class="px-6 py-5 border-gray-300 w-full" style="border-width: 1px;">
                            <p class="text-lg font-bold"> <?=$dg['ho_ten'] ?>-
                                <!-- <span class="text-sm font-normal"><?=$bl['ngay_bl'] ?></span> -->
                            </p>
                            <p>
                      <div class="star_rating">
                        <?php if($dg['xep_hang']==1){

                       echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                       echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9734;</button>';
                       echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9734;</button>';
                       echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9734;</button>';
                       echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9734;</button>';
                        }else if($dg['xep_hang']==2){
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9734;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9734;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9734;</button>';
                        }else if($dg['xep_hang']==3){
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9734;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9734;</button>';
                        }else if($dg['xep_hang']==4){
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9734;</button>';
                        }
                        else{
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                            echo ' <button class="star text-[#ff9800] cursor-pointer border-none">&#9733;</button>';
                        }
                        ?>
                            
                          
                      </div>
                            <?=$dg['noi_dung_danh_gia'] ?>
                            </p>
                        </div>
                    </div>
                    
  <?php 
   }
   ?>
                
                </div>
              
            </div>
        </div>
    </section>
 
<!-- related product-->
 <section class="related_pro my-9 w-[90%] mx-auto ">
        <h3 class="text-3xl font-['Berkshire_Swash'] mb-7">Sản phẩm cùng loại</h3>
        <div class="grid gap-7 xl:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1">         
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14  h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>
    <div class="flex items-around   font-['Raleway']   ">
        <div class="w-[78px] rounded overflow-hidden border-[1.5px] border-solid border-gray-500   group transition-all duration-300 ease-in-out">
            <img class="cursor-pointer transform hover:scale-110 transition-all duration-500" src="./img/image 15.jpg" alt="">
        </div>
        <div class="pl-5">
            <h4 class="text-lg hover:text-[#62d2a2]">Thịt ba rọi heo</h4>
            <div class="w-14 h-[1px] bg-gray-300 my-2"></div>
            <p class="text-[#62d2a2] font-bold ">130,000 đ/1kg</p>
       <div class="text-[14px]"> <span class="line-through text-gray-400">140,000 đ/1kg</span>-8%</div>
    </div>
    </div>

    </div>
 </section>