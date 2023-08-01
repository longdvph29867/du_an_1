<h3 class=" text-2xl">Đăng nhập</h3>
<div class="min-h-[16px]">

</div>
<form action="?ctl=login-khachhang" method="post" class="flex flex-col text-[#333]" id="form-login">
    <div class="flex flex-col mb-2">
        <label for="ma_kh">Tài khoản</label>
        <input type="text" name="ma_kh" id="ma_kh" 
        value="<?php if(isset($ma_kh)) echo $ma_kh ?>"
        class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['ma_kh'])) {
                echo $errors['ma_kh'];
            }
            ?>
        </small>
    </div>
    <div class="flex flex-col mb-2">
        <label for="mat_khau">Mật khẩu</label>
        <input type="password" name="mat_khau" id="mat_khau" 
        value="<?php if(isset($mat_khau)) echo $mat_khau ?>"
        class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['mat_khau'])) {
                echo $errors['mat_khau'];
            }
            ?>
        </small>
    </div>
    <div class="flex flex-col mb-2">
        <label>
            <input type="checkbox" name="ghi_nho"> Ghi nhớ tài khoản?
        </label>
    </div>
    <!-- <a href="?ctl=quen-mk" class="text-base underline decoration-1 text-[#62d2a2]">Quên mật khẩu</a> -->
    <div class="flex justify-between items-end">
        <button name="btn_login" class="text-white text-base uppercase font-semibold bg-[#62d2a2] py-2 px-2 rounded mt-3">Đăng nhập</button>
        <a href="?ctl=register" class="text-xs text-[#62d2a2]">Bạn chưa có tài khoản?</a>
    </div>
</form>