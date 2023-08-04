function chitiet(don_gia, giam_gia, so_luong) {
  let don_giaEl = document.querySelector(".don_gia_ct");
  let so_luongEl = document.querySelector(".tong_so_luong");
  don_giaEl.innerText = don_gia-giam_gia;
  so_luongEl.innerText = so_luong;
  let soLuongKhoInput = document.querySelector('#add-cart-detailPage .so_luong_kho');

  soLuongKhoInput.value = so_luong;
  document.querySelector('input[name="so_luong"]').max = so_luong;
  activeKhoiLuong();
}

function activeKhoiLuong() {
  let inputRadioEls = document.querySelectorAll(".don_vi");
  inputRadioEls.forEach(item => {
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

function changeImage(e,url) {
  let btnImg = document.querySelectorAll('.btn-img-detail')
  let imgDetailEl = document.querySelector("#img-detail");
  let imgDetailClass = imgDetailEl.classList;
  let imgDetailURL = '';
  imgDetailClass.forEach(item => {
    if(item.includes('bg-[url(')) {
      imgDetailURL = item;
    }
  })
  imgDetailEl.classList.remove(imgDetailURL);
  imgDetailEl.classList.add(`bg-[url(${url})]`);


  btnImg.forEach(item => {
    item.classList.remove('border-[#62d2a2]');
    item.classList.add('border-gray-200');
  })
  e.classList.remove('border-gray-200');
  e.classList.add('border-[#62d2a2]');
}
