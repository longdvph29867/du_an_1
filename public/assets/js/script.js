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
// post 1 sp trang chủ
function postCart (data) {
  axios({
    method: "POST",
    url: "http://localhost/du_an_1_API/giohang",
    data: data,
  })
    .then((res) => {
      // console.log(res);
      getQuantityCart(data['ma_kh']);
      showMesssage(true, 'Thêm sản phẩm thành công');
    })
    .catch((err) => {
      console.log(err);
    });
}

function addCartItem(ma_kh, ma_cthh, quantity, so_luong_kho) {
  if(so_luong_kho > 0) {
    let data = {
      ma_kh: ma_kh,
      ma_cthh: ma_cthh,
      so_luong: quantity,
    };
    axios({
      method: "GET",
      url: `http://localhost/du_an_1_API/giohang?ma_kh=${ma_kh}`,
    })
    .then((res) => {
      let listCart = res.data;
      let isValid = true;
      for(let i = 0; i < listCart.length; i++) {
        let itemCart = listCart[i];
        if(ma_cthh == itemCart['ma_cthh']) {
          if(itemCart['so_luong'] >= itemCart['so_luong_kho']) {
            isValid = false;
            break;
          }
        }
      }
      if(isValid) {
        console.log('ok post');
        postCart (data);
      }
      else {
        showMesssage(false, 'Đã quá số lượng hàng có sẵn!');
      }
    })
    .catch((err) => {
      console.log(err);
      showMesssage(false, 'Đã có lỗi sảy ra!');
    });
  }
  else {
    showMesssage(false, 'Đã quá số lượng hàng có sẵn!');
  }
  
}

function updateCartItem(ma_gh, thayDoi) {
  let quantityEl = document.getElementById(`quantity_item_cart_${ma_gh}`);
  let btnGiamEl = document.getElementById(`giam_so_luong_${ma_gh}`);
  let btnTangEl = document.getElementById(`tang_so_luong_${ma_gh}`);
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
      let {ma_kh, so_luong, don_gia, giam_gia, so_luong_kho} = res.data.updatedRow;
      let tongTien = 0;
      getQuantityCart(ma_kh);
      quantityEl.innerText = so_luong
      tongTienItemEl.innerText =  formatCurrencyVND((don_gia - giam_gia)*so_luong) + 'đ';
    
      tongTienItemEls.forEach((item) => {
        tongTien += parseInt(item.innerText.replace(/\./g, ''), 10);
        
      })
      tongTienEl.innerText = formatCurrencyVND(tongTien);

      // giảm về 1 thì chặn
      if(so_luong < 2) {
        btnGiamEl.classList.add('text-gray-400')
        btnGiamEl.setAttribute('disabled', true)
      }
      else {
        btnGiamEl.classList.remove('text-gray-400')
        btnGiamEl.removeAttribute('disabled')
      }

      // tăng quá số lượng kho thì chặn
      if(so_luong >= so_luong_kho) {
        btnTangEl.classList.add('text-gray-400')
        btnTangEl.setAttribute('disabled', true)
      }
      else {
        btnTangEl.classList.remove('text-gray-400')
        btnTangEl.removeAttribute('disabled')
      }

      // xoá thông báo số lượng kho
      if(document.querySelector(`#messQuantity_${ma_gh}`) && (so_luong == so_luong_kho)) {
        document.querySelector(`#messQuantity_${ma_gh}`).innerText = '';
      }
    })
    .catch((err) => {
      alert("Lỗi!");
      console.log(err);
    });
}

function changeVanChuyen (data) {
  let phiShipEl = document.getElementById('phi-ship');
  let idVanChuyen = document.getElementById('ma_van_chuyen').value;
  let tongTien = document.getElementById('tong-tien-sp').innerText;
  let giaVanChuyen = 0
  console.log("🚀 ~ file: script.js:92 ~ changeVanChuyen ~ giaVanChuyen:", giaVanChuyen)
  for(let i = 0; i < data.length; i++) {
    if(data[i].ma_van_chuyen == idVanChuyen) {
      giaVanChuyen = data[i].gia_van_chuyen*1
      phiShipEl.innerText = formatCurrencyVND(giaVanChuyen);
      break;
    }
    else {
      phiShipEl.innerText = formatCurrencyVND(giaVanChuyen);
    }
  }
  document.getElementById('input-thanh-toan').value = (tongTien*1) + giaVanChuyen;
  document.getElementById('thanh-toan').innerText = formatCurrencyVND((tongTien*1) + giaVanChuyen);

}

function formatCurrencyVND(number) {
  const formattedNumber = number.toLocaleString("vi-VN", {
    style: "currency",
    currency: "VND",
  });

  return formattedNumber.replace("₫", "");
}

function datHang(maKH) {
  console.log('oooo');

  axios({
    method: "GET",
    url: `http://localhost/du_an_1_API/giohang?ma_kh=${maKH}`,
  })
    .then((res) => {
      let listCart = res.data;
      let isValid = true;
      for(let i = 0; i < listCart.length; i++) {
        let itemCart = listCart[i];
        if(itemCart['so_luong'] > itemCart['so_luong_kho']) {
          isValid = false;
          break;
        }
      }

      if(isValid) {
        var currentURL = window.location.href;
        // Thay đổi URL thành dạng mới
        var newURL = currentURL.replace("giohang", "order/?ctl=order");
        // Chuyển hướng trang đến URL mới
        window.location.href = newURL.slice(0, -1);
        
      }
      else {
        showMesssage(false, 'Đã quá số lượng hàng có sẵn!');

      }
    })
    .catch((err) => {
      console.log(err);
      showMesssage(false, 'Đã có lỗi sảy ra!');
    });
}

function submitFormFilter () {
  document.getElementById('filter').submit();
}



