<div>
    <div class="normal-case w-full">
        <div class="bg-white rounded w-full max-w-md">
            <h3 class=" text-2xl mb-6">Cập nhật tài khoản</h3>
            <form action="?ctl=update_info" method="post" enctype="multipart/form-data" class="flex flex-col text-[#333] w-full" id="change_info">
                <div class="flex flex-col mb-4">
                    <label for="ma_kh">Tài khoản</label>
                    <input type="text" name="ma_kh" id="ma_kh" readonly value="<?= $user['ma_kh'] ?>" class="text-[#666] border-gray-300 bg-gray-200 text-base px-2 py-2 outline-none mt-1 rounded" style="border-width: 1px;">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="ho_ten">Họ và tên</label>
                    <input type="text" name="ho_ten" id="ho_ten" value="<?= $user['ho_ten'] ?>" class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
                    <small class="text-sm text-red-500">
                        <?php
                        if (!empty($errors['ho_ten'])) {
                            echo $errors['ho_ten'];
                        }
                        ?>
                    </small>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="sdt"> Số điện thoại</label>
                    <input type="text" name="sdt" id="sdt" value="<?= $user['sdt'] ?>" class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
                    <small class="text-sm text-red-500">
                        <?php
                        if (!empty($errors['sdt'])) {
                            echo $errors['sdt'];
                        }
                        ?>
                    </small>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="email">Địa chỉ Email</label>
                    <input type="text" name="email" id="email" value="<?= $user['email'] ?>" class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
                    <small class="text-sm text-red-500">
                        <?php
                        if (!empty($errors['email'])) {
                            echo $errors['email'];
                        }
                        ?>
                    </small>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="hinh">Hình</label>
                    <input type="text" name="old_hinh" value="<?= $user['hinh'] ?>" hidden>
                    <input type="file" name="hinh" id="hinh" class="text-[#666] border-gray-300 bg-[#f7f7f7] text-base px-2 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded" style="border-width: 1px;">
                    <small><?= $user['hinh'] ?></small>
                    <small class="text-sm text-red-500">
                        <?php
                        if (!empty($errors['hinh'])) {
                            echo $errors['hinh'];
                        }
                        ?>
                    </small>
                </div>
                <div class="flex justify-between items-end">
                    <button name="btn_update_info" class="text-white text-base uppercase font-semibold bg-[#62d2a2] py-2 px-2 rounded mt-3">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>