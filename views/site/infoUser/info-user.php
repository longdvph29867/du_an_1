<h3 class="text-2xl mb-4">Thông tin tài khoản</h3>
<?php 
    if(isset($MESSAGE_SUCCESS)) {
        echo "<p><i class='fa-solid fa-circle-check text-green-500'></i> $MESSAGE_SUCCESS</p>";
    }
    if(isset($MESSAGE_ERROR)) {
        echo "<p><i class='fa-sharp fa-solid fa-circle-exclamation text-red-500'></i> $MESSAGE_ERROR</p>";
    }
?>
<div>
    <div class="normal-case w-full flex gap-8 sm:flex-row flex-col">
        <div class="w-1/3">
            <img class="" src="<?= url_public . '/images/users/' . $user['hinh']?>" alt="">
        </div>
        <div>
            <div class="my-3">
                <h6 class="">Họ tên: <span class="font-bold"><?=$user['ho_ten']?></span></h6>
                <p>Số điện thoại:: <span class="font-bold"><?=$user['sdt']?></span></p>
                <p>Email: <span class="font-bold"><?=$user['email']?></span></p>
            </div>
            <div class="flex flex-col items-start space-y-1">
                <a href="?ctl=form_change_pass" class="btn1">ĐỔi mật khẩu</a>
                <a href="?ctl=form_change_info" class="btn1">Cập nhật thài khoản</a>
            </div>

        </div>
    </div>
</div>