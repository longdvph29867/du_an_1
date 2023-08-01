
$().ready(function () {
  // file đuôi file
  $.validator.addMethod(
    "fileExtension",
    function (value, element, param) {
      param = typeof param === "string" ? param.replace(/\s/g, "") : "";
      var extensions = param.split(",");
      var fileExtension = value.split(".").pop().toLowerCase();
      return (
        this.optional(element) || $.inArray(fileExtension, extensions) !== -1
      );
    },
    "Please select a file with a valid extension."
  );

  // file size
  $.validator.addMethod(
    "fileSize",
    function (value, element, param) {
      var fileSize = element.files[0].size; // Lấy kích thước tệp tin
      var maxSize = param * 1024 * 1024; // Chuyển đổi giá trị đơn vị thành byte

      return this.optional(element) || fileSize <= maxSize;
    },
    "File size must be less than or equal to {0} MB."
  );
  $("#change_info").validate({
    rules: {
      ho_ten: {
        required: true,
        maxlength: 30,
        minlength: 6,
      },
      sdt: {
        required: true,
        pattern: /^(0[3|5|7|8|9])+([0-9]{8})$/
      },
      email: {
        required: true,
        email: true,
      },
      hinh: {
        fileExtension: "png,jpeg,jpg,webp",
        fileSize: 2,
        maxlength: 45,
      },
    },
    messages: {
      ho_ten: {
        required: "Vui lòng nhập họ tên!",
        maxlength: "Họ tên phải 6 - 30 ký tự!",
        minlength: "Họ tên phải 6 - 30 ký tự!",
      },
      sdt: {
        required: 'Vui lòng nhập số điện thoại!',
        pattern: 'Số điện thoại không hợp lệ!',
      },
      email: {
        required: "Vui lòng nhập Email!",
        email: "Email chưa đúng định dạng!",
      },
      hinh: {
        fileExtension: "File phải có định dạng là png, jpg, jpeg, webp!",
        fileSize: "Kích thước không quá 2 MB!",
        maxlength: "Tên file quá dài!",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
  $("#change_password").validate({
    rules: {
      mat_khau: {
        required: true,
      },
      mat_khau2: {
        required: true,
        maxlength: 16,
        minlength: 6,
      },
      mat_khau3: {
        required: true,
        equalTo: "#mat_khau2",
      },
    },
    messages: {
      mat_khau: {
        required: "Vui lòng nhập mật khẩu!",
      },
      mat_khau2: {
        required: "Vui lòng nhập mật khẩu mới!",
        maxlength: "Mật khẩu phải 6 - 16 ký tự!",
        minlength: "Mật khẩu phải 6 - 16 ký tự!",
      },
      mat_khau3: {
        required: "Vui lòng nhập lại mật khẩu mới!",
        equalTo: "Mật khẩu mới không khớp!",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
  $("#add_dateil_comment").validate({
    rules: {
      noi_dung: {
        required: true,
      },
    },
    messages: {
      noi_dung: {
        required: "Vui lòng nhập mật khẩu!",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
  console.log(document.getElementById('form-insert-order'));
  $('#form-insert-order').validate({
    rules: {
      ten_nguoi_nhan: {
        required: true,
        maxlength: 49,
        minlength: 4,
      },
      sdt: {
        required: true,
        pattern: /^(0[3|5|7|8|9])+([0-9]{8})$/
      },
      dia_chi_nhan: {
        required: true,
        maxlength: 200,
        minlength: 4,
      },
      ma_van_chuyen: {
        required: true,
      },
      ghi_chu: {
        maxlength: 200,
      }
    },
    messages: {
      ten_nguoi_nhan: {
        required: 'Vui lòng nhập tên!',
        maxlength: 'Tài khoản phải 4 - 50 ký tự!',
        minlength: 'Tài khoản phải 4 - 50 ký tự!'
      },
      sdt: {
        required: 'Vui lòng nhập số điện thoại!',
        pattern: 'Số điện thoại không hợp lệ!',
      },
      dia_chi_nhan: {
        required: 'Vui lòng nhập địa chỉ!',
        maxlength: 'Địa chỉ phải 4 - 200 ký tự!',
        minlength: 'Địa chỉ phải 4 - 200 ký tự!'
      },
      ma_van_chuyen: {
        required: 'Vui lòng chọn đơn vị vận chuyển!',
      },
      ghi_chu: {
        maxlength: 'Ghi chú tối đa 200 ký tự!',
      },
    },
    submitHandler: function(form) {
      form.submit();
    }
});
});

// validate add cart
if(document.getElementById("add-cart-detailPage")) {
  let formAddCart = document.getElementById("add-cart-detailPage");
  formAddCart.addEventListener("submit", function (event) {
    event.preventDefault();
    let isValid = false;
  
    var loaiRadiosAll = formAddCart.querySelectorAll('input[type="radio"]');
    for (var i = 0; i < loaiRadiosAll.length; i++) {
      if (loaiRadiosAll[i].checked) {
        isValid = true;
        break;
      }
    }
    
    if (isValid) {
      document.querySelector('.error-add-cart').innerText = "";
      this.submit();
    }
    else {
      document.querySelector('.error-add-cart').innerText = "Vui lòng chọn loại hàng!";
    }
  });
}


//
if(document.getElementById("insert_review")) {
  let formReview = document.getElementById("insert_review");
  let inputs = formReview.querySelectorAll("input");
  formReview.addEventListener("submit", function (event) {
    event.preventDefault();
    let isValid = true;
    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].value.trim() === "") {
        isValid = false;
        inputs[i].nextElementSibling.innerText = "Vui lòng nhập trường này!";
      } else {
        inputs[i].nextElementSibling.innerText = "";
      }
    }
  
    var ratingRadiosAll = formReview.querySelectorAll('input[type="radio"]');
    var groupNames = [];
  
    ratingRadiosAll.forEach((item) => {
      if (!groupNames.includes(item.name)) {
        groupNames.push(item.name);
      }
    });
  
    groupNames.forEach((item) => {
      let error = false;
      let ratingRadios = formReview.querySelectorAll(`input[name="${item}"]`);
      for (var i = 0; i < ratingRadios.length; i++) {
        if (ratingRadios[i].checked) {
          error = true;
        }
      }
      if (error) {
        document.getElementById(`error-${item}`).innerText = "";
      } else {
        isValid = false;
        document.getElementById(`error-${item}`).innerText =
          "Vui lòng chọn trường này!";
      }
    });
  
    if (isValid) {
      this.submit();
    }
  });
}

// rating

function handleRadioChange(id) {
  let ratingRadios = document.querySelectorAll(`input[name="rating[${id}]"]`);
  let inputChecker = document.querySelector(
    `input[name="rating[${id}]"]:checked`
  );

  let selectedRating = 0;
  for (let i = 0; i < ratingRadios.length; i++) {
    if (ratingRadios[i].checked) {
      selectedRating = ratingRadios[i].value;
    }
    starIcon = ratingRadios[i].nextElementSibling;
    starIcon.classList.remove("text-yellow-400");
  }

  for (let i = 0; i < ratingRadios.length; i++) {
    starIcon = ratingRadios[i].nextElementSibling;
    if (i < selectedRating) {
      starIcon.classList.add("text-yellow-400");
    }
  }
}
