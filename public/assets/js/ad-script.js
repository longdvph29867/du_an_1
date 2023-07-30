let count = 1;
function addFormThuocTinh() {
  if (count > 4) {
    alert("Tối đa 5 thuộc tính");
  } else {
    const containerThuocTinh = document.getElementById("list-thuoc-tinh");
    const newDiv = document.createElement("div");
    const newHTML = `
          <div class="thuoc-tinh-div border bg-white p-3 rounded mb-3">
              <div class="text-right pb-2">
                  <button onclick="removeFormThuocTinh(this)" type="button" class="btn btn-danger my-auto"><i class="fa-solid fa-xmark"></i></button>
              </div>
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="don_vi">Đơn vị <span class="text-danger">*</span></label>
                          <input id="don_vi" type="text" name="don_vi[]" class="form-control" value="">
                          <small id="helpId" class="text-danger"></small>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="don_gia">Đơn giá <span class="text-danger">*</span></label>
                          <input id="don_gia" type="number" name="don_gia[]" class="form-control" value="">
                          <small id="helpId" class="text-danger"></small>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="giam_gia">Giảm giá <span class="text-danger">*</span></label>
                          <input id="giam_gia" type="number" name="giam_gia[]" class="form-control" value="">
                          <small id="helpId" class="text-danger"></small>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label for="so_luong">Số lượng hàng <span class="text-danger">*</span></label>
                          <input id="so_luong" type="number" name="so_luong[]" class="form-control" value="">
                          <small id="helpId" class="text-danger"></small>
                      </div>
                  </div>
              </div>
          </div>`;
    newDiv.innerHTML = newHTML;
    containerThuocTinh.appendChild(newDiv);
    count++;
}
}
function removeFormThuocTinh(el) {
    if(count <= 1) {
        alert("Tối thiểu 1 thuộc tính");
    }
    else {
        const elRemove = el.closest(".border.bg-white.p-3.rounded.mb-3");
        if(elRemove) {
            elRemove.remove();
        }
        count--;
    }
}

function submitForm(id) {
    let isValid = true;
    let formEL = document.getElementById(id);
    var fileInput = formEL.querySelector('input[name="file"]');
    const file = fileInput.files;
    if (file.length === 0) {
        fileInput.parentElement.nextElementSibling.innerText = 'Vui lòng chọn file!' 
        isValid = false;
    }

    if (file[0].name.length > 15) {
        fileInput.parentElement.nextElementSibling.innerText = 'Tên fiel quá dài!' 
        isValid = false;
    }

    const allowedExtensions = ['png', 'jpg', 'jpeg', 'webp'];
    const fileExtension = file[0].name.split('.').pop().toLowerCase();

    if (!allowedExtensions.includes(fileExtension)) {
        fileInput.parentElement.nextElementSibling.innerText = 'File phải có định dạng là png, jpg, jpeg, webp!'
        isValid = false;
    }

    if (file[0].size > 2 * 1024 * 1024) {
        fileInput.parentElement.nextElementSibling.innerText = 'FIle không qúa 2MB!' 
        isValid = false;
    }

    if(isValid) {
        formEL.submit();

    }
    
}
