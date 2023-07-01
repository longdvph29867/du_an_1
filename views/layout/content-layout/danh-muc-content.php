<div class="lg:mb-5 p-4 lg:pt-0 lg:w-full sm:w-1/2 w-full">
    <h3 class="text-2xl font-['Berkshire_Swash'] mb-4">Danh mục</h3>
    <ul>
        <?php
        foreach ($dsloai as $loai) {
        $link = '../hang-hoa/liet-ke.php?ma_loai='.$loai['ma_loai'];
        ?>
            <li>
                <a href="<?=$link?>" class="block px-3 py-3 bg-[#f8f8f8] border-b-2 border-white duration-300 hover:text-white hover:bg-[#62d2a2]"><?= $loai['ten_loai'] ?></a>
            </li>
        <?php
        }
        ?>

    </ul>
</div>