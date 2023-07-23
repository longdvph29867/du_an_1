const serverUrl = "";

function getQuantityCart(ma_kh) {
  axios({
    method: "GET",
    url: `http://localhost/du_an_1_API/giohang?ma_kh=${ma_kh}`,
  })
    .then((res) => {
      let quantityCart = 0;
      res.data.forEach((item) => {
        quantityCart += item["so_luong"];
      });
      document.querySelector(".cart_header .quantity_cart").innerText =
        quantityCart;
    })
    .catch((err) => {
      console.log(err);
    });
}
// getQuantityCart();

function addCartItem(ma_kh, ma_cthh, quantity) {
  let data = {
    ma_kh: ma_kh,
    ma_cthh: ma_cthh,
    so_luong: quantity,
  };
  axios({
    method: "POST",
    url: "http://localhost/du_an_1_API/giohang",
    data: data,
  })
    .then((res) => {
      // console.log(res);
      getQuantityCart(ma_kh);
    })
    .catch((err) => {
      console.log(err);
    });
}
function updateCartItem(ma_gh, thayDoi) {
  let quantityEl = document.getElementById(`quantity_item_cart_${ma_gh}`);
  let btnGiamEl = document.getElementById(`giam_so_luong_${ma_gh}`);
  let tongTienItemEl = document.getElementById(`tong_tien_item_cart_${ma_gh}`);
  let tongTienItemEls = document.querySelectorAll('.tong_tien_item');
  let tongTienEl = document.getElementById(`tong_tien`);
  let soLuong = quantityEl.innerText * 1;
  let data = {
    ma_gh: ma_gh,
    so_luong: (soLuong + thayDoi),
  };
  axios({
    method: "PUT",
    url: "http://localhost/du_an_1_API/giohang",
    data: data,
  })
    .then((res) => {
      let {ma_kh, so_luong, don_gia, giam_gia} = res.data.updatedRow;
      let tongTien = 0;
      getQuantityCart(ma_kh);
      quantityEl.innerText = so_luong
      tongTienItemEl.innerText = (don_gia - giam_gia)*so_luong
      
      tongTienItemEls.forEach((item) => {
        tongTien += item.innerText*1;
        
      })
      tongTienEl.innerText = tongTien


      if(so_luong < 2) {
        btnGiamEl.classList.add('text-gray-400')
        btnGiamEl.setAttribute('disabled', true)
      }
      else {
        btnGiamEl.classList.remove('text-gray-400')
        btnGiamEl.removeAttribute('disabled')
      }
    })
    .catch((err) => {
      alert("Lỗi!")
      console.log(err);
    });
}


