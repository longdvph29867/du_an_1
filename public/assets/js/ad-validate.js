
// validate add cart
let formAddProduct = document.getElementById("form-insert-hh");
formAddProduct.addEventListener("submit", function (event) {
  event.preventDefault();
  let isValid = true;
  var tenSpInput = formAddProduct.querySelector('input[name="ten_hh"]');
  var loaiInput = formAddProduct.querySelector('select[name="ma_loai"]');
  var motaInput = formAddProduct.querySelector('textarea[name="mo_ta"]');
  var dacBietInput = formAddProduct.querySelectorAll('input[name="dac_biet"]');
  var fileInput = formAddProduct.querySelector('input[name="files[]"]');
  if (tenSpInput.value.trim() === "") {
    isValid = false;
    tenSpInput.nextElementSibling.innerText = 'Vui lòng nhập tên sản phẩm';
  }
  else {
    tenSpInput.nextElementSibling.innerText = '';
  }

  if (tenSpInput.value.trim() === "") {
    isValid = false;
    tenSpInput.nextElementSibling.innerText = 'Vui lòng nhập tên sản phẩm';
  }
  else {
    tenSpInput.nextElementSibling.innerText = '';
  }

  if (loaiInput.value.trim() === "") {
    isValid = false;
    loaiInput.parentElement.nextElementSibling.innerText = 'Vui lòng nhập tên loại hàng';
  }
  else {
    loaiInput.parentElement.nextElementSibling.innerText = '';
  }

  if (motaInput.value.trim() === "") {
    isValid = false;
    motaInput.nextElementSibling.innerText = 'Vui lòng nhập tên mô tả';
  }
  else {
    motaInput.nextElementSibling.innerText = '';
  }

  let isChecked = false;
  for(let i = 0; i < dacBietInput.length; i++) {
    if(dacBietInput[i].checked) {
      isChecked = true;
    }
  }
  if (!isChecked) {
    isValid = false;
    formAddProduct.querySelector('.error-dacbiet').innerText = 'Vui lòng nhập trường này';
  }
  else {
    formAddProduct.querySelector('.error-dacbiet').innerText = '';
  }
  isValid = validateFiles (fileInput);

  let thuocTinhDivs = formAddProduct.querySelectorAll('.thuoc-tinh-div');
  for (var i = 0; i < thuocTinhDivs.length; i++) {
    var donViInput = thuocTinhDivs[i].querySelector('input[name="don_vi[]"]');
    var donGiaInput = thuocTinhDivs[i].querySelector('input[name="don_gia[]"]');
    var giamGiaInput = thuocTinhDivs[i].querySelector('input[name="giam_gia[]"]');
    var soLuongInput = thuocTinhDivs[i].querySelector('input[name="so_luong[]"]');

    if (donViInput.value.trim() === "") {
      isValid = false;
      donViInput.nextElementSibling.innerText = 'Vui lòng nhập đơn vị';
    }
    else {
      donViInput.nextElementSibling.innerText = '';
    }

    if (donGiaInput.value.trim() === "" || isNaN(donGiaInput.value)) {
      isValid = false;
      donGiaInput.nextElementSibling.innerText = 'Vui lòng nhập đơn giá hợp lệ';
    }
    else {
      donGiaInput.nextElementSibling.innerText = '';
    }

    if (giamGiaInput.value.trim() === "" || isNaN(giamGiaInput.value)) {
      isValid = false;
      giamGiaInput.nextElementSibling.innerText = 'Vui lòng nhập giảm giá hợp lệ';
    }
    else {
      giamGiaInput.nextElementSibling.innerText = '';
    }

    if (soLuongInput.value.trim() === "" || isNaN(soLuongInput.value)) {
      isValid = false;
      soLuongInput.nextElementSibling.innerText = 'Vui lòng nhập số lượng hợp lệ';
    }
    else {
      soLuongInput.nextElementSibling.innerText = '';
    }

  }

  if (isValid) {
    this.submit();
  }
});

function validateFiles (inputFile) {
  const files = inputFile.files;
  if (files.length === 0) {
    inputFile.parentElement.nextElementSibling.innerText = 'Vui lòng chọn file!' 
    return false;
  }
  if (files.length > 5) {
    inputFile.parentElement.nextElementSibling.innerText = 'Tối đã 5 file!' 
    return false;
  }

  const allowedExtensions = ['png', 'jpg', 'jpeg', 'webp'];
  for (const file of files) {

    if (file.name.length > 15) {
      inputFile.parentElement.nextElementSibling.innerText = 'Tên fiel quá dài!' 
      return false;
    }

    const fileExtension = file.name.split('.').pop().toLowerCase();
    if (!allowedExtensions.includes(fileExtension)) {
      inputFile.parentElement.nextElementSibling.innerText = 'File phải có định dạng là png, jpg, jpeg, webp!'
      return false;
    }

    if (file.size > 2 * 1024 * 1024) {
      inputFile.parentElement.nextElementSibling.innerText = 'FIle không qúa 2MB!' 
      return false;
    }
  }
  inputFile.parentElement.nextElementSibling.innerText = '' 

  return true;
}






