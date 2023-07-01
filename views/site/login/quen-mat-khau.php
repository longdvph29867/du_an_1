<h3 class=" text-2xl">Quên mật khẩu</h3>
<div class="min-h-[16px]">
    <?php
    if (!empty($MESSAGE_ERROR)) {
        echo "<p><i class='fa-sharp fa-solid fa-circle-exclamation text-red-500'></i> $MESSAGE_ERROR</p>";
    }
    ?>
</div>
<form action="?ctl=change-pass" method="post" id="form-get-password" class="flex flex-col text-[#333]">
    <div class="flex flex-col mb-4">
        <label for="username">Tài khoản</label>
        <input type="text" name="ma_kh" id="username" value="<?php if (isset($ma_kh)) echo $ma_kh ?>" class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['ma_kh'])) {
                echo $errors['ma_kh'];
            }
            ?>
        </small>
    </div>
    <div class="flex flex-col mb-4">
        <label for="email">Địa chỉ Email</label>
        <input type="text" name="email" id="email" value="<?php if (isset($email)) echo $email ?>" class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
        <small class="text-sm text-red-500">
            <?php
            if(!empty($errors['email'])) {
                echo $errors['email'];
            }
            ?>
        </small>
    </div>
    <div class="flex justify-between items-end">
        <button type="submit" class="text-white text-base uppercase font-semibold bg-[#62d2a2] py-2 px-2 rounded mt-3">Tìm lại mật khẩu</button>
        <a href="?ctl=login" class="text-xs text-[#62d2a2]">Quay lại đăng nhập</a>
    </div>
</form>