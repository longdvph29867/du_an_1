function chitiet(don_gia, so_luong) {
  let don_giaEl = document.querySelector(".don_gia_ct");
  let so_luongEl = document.querySelector(".tong_so_luong");
  don_giaEl.innerText = don_gia;
  so_luongEl.innerText = so_luong;
  activeKhoiLuong();
}

function activeKhoiLuong() {
  let inputRadioEls = document.querySelectorAll(".don_vi");
  inputRadioEls.forEach(item => {
    console.log("🚀 ~ file: chitietsp.js:12 ~ activeKhoiLuong ~ item:", item)
    if(item.checked) {
      item.parentElement.classList.add('border-[#62d2a2]')
      item.nextElementSibling.classList.remove('hidden')
      item.nextElementSibling.classList.add('inline-block')
    }
    else{
      item.parentElement.classList.remove('border-[#62d2a2]')
      item.nextElementSibling.classList.add('hidden')
      item.nextElementSibling.classList.remove('inline-block')
    }
    
  })
}
