
    <!-- banner_slide -->
    <section class="banner relative flex items-center justify-center h-40 w-full bg-cover bg-center border-t-2 border-gray-200">
        <img class="w-full h-full object-cover absolute  mix-blend-overlay" src="<?= url_public ?>/assets/images/breadcrumb-banner.webp" alt="">
        <div class="text-center text-black py-24">
            <h2 class="pb-5  font-['Berkshire_Swash'] text-4xl">Cửa hàng</h2>
            <p class="">Trang chủ / Chi tiết sản phẩm</p>
        </div>
    </section>

    <!-- pay Details-->
    <div class="container mx-auto grid md:grid-cols-2 sm:grid-cols-1 gap-10 mt-10">
        <div>
            <h2
                class="text-[#333333] pb-4 border-b mb-8 font-bold border-solid border-[#ccc] text-xl">
                Billing Details</h2>
            <div class="billing-form-wrap">
                <form action="#">
                    <div class="flex flex-col mb-3">
                        <label for="ma_kh">Họ tên người nhận</label>
                        <input type="text" name="ma_kh" id="ma_kh" 
                        value="123"
                        class="text-[#666] border border-gray-300 bg-[#f7f7f7] text-base px-3 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded">
                        <small class="min-h-[20px] text-sm text-red-500">
                            123
                        </small>
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="ma_kh">Số điện thoại người nhận</label>
                        <input type="text" name="ma_kh" id="ma_kh" 
                        value="123"
                        class="text-[#666] border border-gray-300 bg-[#f7f7f7] text-base px-3 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded">
                        <small class="min-h-[20px] text-sm text-red-500">
                            123
                        </small>
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="ma_kh">Địa chỉ Nhận hàng</label>
                        <input type="text" name="ma_kh" id="ma_kh" 
                        value="123"
                        class="text-[#666] border border-gray-300 bg-[#f7f7f7] text-base px-3 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded">
                        <small class="min-h-[20px] text-sm text-red-500">
                            123
                        </small>
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="">Đơn vị vận chuyển</label>
                        <select name="" id="" 
                        class="text-[#666] border border-gray-300 bg-[#f7f7f7] text-base px-3 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded">
                            <option value="1">1234</option>
                            <option value="1">1234</option>
                            <option value="1">1234</option>
                        </select>
                        <small class="min-h-[20px] text-sm text-red-500">
                            123
                        </small>
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="ma_kh">Ghi chú</label>
                        <textarea name="" id="" cols="30" rows="5" placeholder="Nhập ghi chú..."
                        class="text-[#666] border border-gray-300 bg-[#f7f7f7] text-base px-3 py-2 outline-none focus:border-[#62d2a2] mt-1 focus:bg-white rounded"
                        ></textarea>
                        <small class="min-h-[20px] text-sm text-red-500">
                            123
                        </small>
                    </div>
                </form>
            </div>
        </div>
        <!-- order_summary -->
        <div>
            <h2 class="text-[#333333] pb-4 border-b mb-8 font-bold border-solid border-[#ccc] text-xl">
                Billing Details
            </h2>
            <div>
                <table class="table w-full">
                    <thead class="">
                        <tr>
                            <th class="w-2/3 border py-3 px-2">Products</th>
                            <th class="w-1/3 border py-3 px-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border py-3 px-2 font-normal">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-start">
                                        <div class="w-16 h-16 rounded" style="border: 1px solid #d9d9d9;">
                                            <img class="h-full w-full object-cover rounded" src="https://cdn.shopify.com/s/files/1/0195/8916/9252/products/04_d5c09cb8-03d6-4d1c-a575-01dc472ca77e_small.jpg?v=1601984178" alt="">
                                        </div>
                                        <div class="pl-4">
                                            <h4 class="text-[#62d2a2] ">Exercita Tionem Ulam</h4>
                                            <p class="text-[#717171] text-xs">L / yellow</p>
                                        </div>
                                    </div>
                                    <p class="text-xs text-[#717171]">x <span class="text-black text-base">1</span></p>
                                </div>
                            </td>
                            <td class="border py-3 px-2 font-normal text-center">$165.00</td>
                        </tr>
                        <tr>
                            <td class="border py-3 px-2 font-normal">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-start">
                                        <div class="w-16 h-16 rounded" style="border: 1px solid #d9d9d9;">
                                            <img class="h-full w-full object-cover rounded" src="https://cdn.shopify.com/s/files/1/0195/8916/9252/products/04_d5c09cb8-03d6-4d1c-a575-01dc472ca77e_small.jpg?v=1601984178" alt="">
                                        </div>
                                        <div class="pl-4">
                                            <h4 class="text-[#62d2a2] ">Exercita Tionem Ulam</h4>
                                            <p class="text-[#717171] text-xs">L / yellow</p>
                                        </div>
                                    </div>
                                    <p class="text-xs text-[#717171]">x <span class="text-black text-base">1</span></p>
                                </div>
                            </td>
                            <td class="border py-3 px-2 font-normal text-center">$165.00</td>
                        </tr>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="border py-3 px-2 font-normal">Tổng tiền hàng</td>
                            <td class="border py-3 px-2 font-normal text-center"><strong>$400</strong></td>
                        </tr>
                        <tr>
                            <td class="border py-3 px-2 font-normal">Phí vận chuyển</td>
                            <td class="border py-3 px-2 font-normal text-center">
                                123
                            </td>
                        </tr>
                        <tr>
                            <td class="border py-3 px-2 font-semibold">Thành tiền</td>
                            <td class="border py-3 px-2 font-normal text-center text-xl text-[#62d2a2]"><strong>$470</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="mt-5">
                <div class="grid grid-cols-2 gap-5">
                    <label class="relative flex items-center justify-center p-3 border border-[#62d2a2] rounded-xl overflow-hidden">
                        <img class="w-16 h-16" src="<?= url_public ?>/assets/images/cash-on-delivery.png" alt="">
                        <span class="pl-3">
                            Thanh Toán khi nhận hàng
                        </span>
                        <img
                        class="absolute top-0 right-0 w-10"
                        src="<?= url_public ?>/assets/images/img-check.png" alt="">
                    </label>
                    <label class="relative flex items-center justify-center p-3 border border-gray-300 rounded-xl overflow-hidden">
                        <img class="w-16 h-16" src="<?= url_public ?>/assets/images/logo VNPAY-02.png" alt="">
                        <span class="pl-3">
                            Thanh Toán Online
                        </span>
                        <div class="absolute w-full h-full top-0 left-0 bg-gray-500/80 text-white/80 flex items-center justify-center pt-8">
                            Chức năng đang cập nhật...
                        </div>
                    </label>
                </div>
            </div>
            <div class="mt-5">
                <button class="text-white text-xl rounded-md py-2 px-6 border border-[#62d2a2] bg-[#62d2a2] hover:bg-white hover:text-[#62d2a2] duration-300">
                    Đặt hàng
                </button>
            </div>
        </div>
    </div>
