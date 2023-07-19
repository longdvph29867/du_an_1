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

function addCart(data) {
  axios({
    method: "POST",
    url: "http://localhost/du_an_1_API/giohang",
    data: data,
  })
    .then((res) => {
      console.log(res);
    })
    .catch((err) => {
      console.log(err);
    });
}
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
