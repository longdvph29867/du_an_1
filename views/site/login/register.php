<h3 class=" text-2xl">Đăng ký</h3>
<div class="min-h-[16px]">
    <?php
    if (!empty($MESSAGE_ERROR)) {
        echo "<p><i class='fa-sharp fa-solid fa-circle-exclamation text-red-500'></i> $MESSAGE_ERROR</p>";
    }
    ?>
</div>
<form action="?ctl=insert-khachhang" method="post" enctype="multipart/form-data" class="flex flex-col text-[#333]" id="form-register">
    <div class="flex flex-col mb-3">
        <label for="ma_kh">Tài khoản</label>
        <input type="text" name="ma_kh" id="ma_kh" 
        value="<?php if(isset($ma_kh)) echo $ma_kh ?>"
        class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-1 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['ma_kh'])) {
                echo $errors['ma_kh'];
            }
            ?>
        </small>
    </div>
    <div class="flex flex-col mb-3">
        <label for="mat_khau">Mật khẩu</label>
        <input type="password" name="mat_khau" id="mat_khau" 
        value="<?php if(isset($mat_khau)) echo $mat_khau ?>"
        class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-1 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['mat_khau'])) {
                echo $errors['mat_khau'];
            }
            ?>
        </small>
    </div>
    <div class="flex flex-col mb-3">
        <label for="re_password">Nhập lại mật khẩu</label>
        <input type="password" name="re_password" id="re_password" 
        value="<?php if(isset($re_password)) echo $re_password ?>"
        class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-1 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['re_password'])) {
                echo $errors['re_password'];
            }
            ?>
        </small>
    </div>
    <div class="flex flex-col mb-3">
        <label for="ho_ten">Họ tên</label>
        <input type="text" name="ho_ten" id="ho_ten" 
        value="<?php if(isset($ho_ten)) echo $ho_ten ?>"
        class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-1 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['ho_ten'])) {
                echo $errors['ho_ten'];
            }
            ?>
        </small>
    </div>
    <div class="flex flex-col mb-3">
        <label for="sdt">Số điện thoại</label>
        <input type="number" name="sdt" id="sdt" 
        value="<?php if(isset($sdt)) echo $sdt ?>"
        class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-1 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['sdt'])) {
                echo $errors['sdt'];
            }
            ?>
        </small>
    </div>
    <div class="flex flex-col mb-3">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" 
        value="<?php if(isset($email)) echo $email ?>"
        class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-1 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['email'])) {
                echo $errors['email'];
            }
            ?>
        </small>
    </div>
    <div class="flex flex-col mb-3">
        <label for="hinh">Hình ảnh</label>
        <input type="file" name="hinh" id="hinh" class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-1 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['hinh'])) {
                echo $errors['hinh'];
            }
            ?>
        </small>
    </div>
    <div class="flex justify-between items-end">
        <div>
            <button type="submit" class="text-white text-base uppercase font-semibold bg-[#62d2a2] py-2 px-2 rounded mt-3">Đăng ký</button>
            <button type="reset" class="text-white text-base uppercase font-semibold bg-gray-600 py-2 px-2 rounded mt-3">Reset</button>
        </div>
        <a href="?ctl=login" name="" class="text-xs text-[#62d2a2]">Bạn đã có tài khoản?</a>

    </div>
</form>