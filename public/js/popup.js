const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const closeBtns = $$(".close-btn");
const containerClose = $("#regis_log_sg");
const loginNow = $(".login-now");
const regisNow = $(".regis-now");
const regisBox = $(".container_regis");
const loginBox = $(".container_log");
const regisBtn = $(".regis-btn");
const loginBtn = $(".login-btn");
const phoneNum = $$("#phone-num");
const pw = $$("#pw");
const cfPw = $("#cf-pw");
const fullName = $('#name');

// Get cookie of user id
function getCookie(name) {
  const cookies = document.cookie.split('; ');
  for (let i = 0; i < cookies.length; i++) {
    const cookie = cookies[i].split('=');
    if (cookie[0] === name) {
      return cookie[1];
    }
  }
  return null;
}

const user_id = getCookie('user_id');
let timeFL;
const secondTime = sessionStorage.getItem("secondTime");
if (secondTime || user_id) {
  containerClose.style.display = "none";
  clearTimeout(timeFL);
} else {
  timeFL = setTimeout(function () {
    regisBox.style.transform = "translateY(0)";
  }, 2000);
}

closeBtns[0].onclick = function () {
  containerClose.style.display = "none";
  sessionStorage.setItem("secondTime", "true")
};

closeBtns[1].onclick = function () {
  containerClose.style.display = "none";
  sessionStorage.setItem("secondTime", "true")
};

loginNow.onclick = function () {
  regisBox.style.transform = "translateY(-600px)";
  loginBox.style.transform = "translateY(0)";
};

regisNow.onclick = function () {
  regisBox.style.transform = "translateY(0)";
  loginBox.style.transform = "translateY(1000px)";
};

function isError(input, message) {
  let siblingElem = input.nextElementSibling;
  input.classList.add("error");
  input.classList.add("placeHD");
  input.classList.remove("success");
  siblingElem.classList.add("error");
  siblingElem.innerText = message;
}

function isSuccess(input) {
  let siblingElem = input.nextElementSibling;
  input.classList.remove("error");
  input.classList.add("success");
  input.classList.remove("placeHD");
  siblingElem.classList.remove("error");
  siblingElem.innerText = "";
}

function checkName(input) {
  let nameReg = /^[^\d]+$/
  if (input.value === '') {
      isError(input, 'Vui lòng nhập tên!')
      return false
  } else if (!input.value.match(nameReg)) {
      isError(input, 'Tên không hợp lệ!')
      return false
  } else {
      isSuccess(input)
      return true
  }
}

function checkPhoneNumber(input) {
  let isEmty = true;
  let phoneNumReg = /^0\d{9}$/;
  if (!phoneNumReg.test(input.value)) {
    isError(input, "Số điện thoại không hợp lệ!");
    isEmty = false;
  } else {
    isSuccess(input);
  }
  return isEmty;
}

function checkPassword(input) {
  let isEmty = true;
  if (input.value.trim().length > 8) {
    isError(input, "Vui lòng nhập mật khẩu dưới 8 kí tự!");
    isEmty = false;
  } else {
    isSuccess(input);
  }
  return isEmty;
}

function checkConfirmPass(input1, input2) {
  let isEmty = true;
  if (input1.value.trim() !== input2.value.trim()) {
    isError(input2, "Mật khẩu không trùng khớp!");
    isEmty = false;
  } else {
    isSuccess(input2);
  }
  return isEmty;
}

regisBtn.onclick = function (e) {
  let isEmtyName = fullName.value === "";
  let isEmtyPhoneNum = phoneNum[0].value.trim() === "";
  let isEmtyPw = pw[0].value.trim() === "";
  let isEmtyCfpw = cfPw.value.trim() === "";

  if (isEmtyName || isEmtyPhoneNum || isEmtyPw || isEmtyCfpw) {
    e.preventDefault();
    if (isEmtyPhoneNum) {
      isError(phoneNum[0], "Vui lòng nhập số điện thoại!");
    } else {
      checkPhoneNumber(phoneNum[0]);
    }
    if (isEmtyPw) {
      isError(pw[0], "Vui lòng nhập mật khẩu!");
    } else {
      checkPassword(pw[0]);
    }
    if (isEmtyCfpw) {
      isError(cfPw, "Vui lòng xác nhận mật khẩu!");
    } else {
      checkConfirmPass(pw[0], cfPw);
    }
    if (isEmtyName) {
      isError(fullName, "Vui lòng nhập tên!");
    } else {
      checkName(fullName);
    }
  } else {
    alert("Đăng ký tài khoản thành công! Vui lòng đăng nhập!");
    regisBox.style.transform = "translateY(-600px)";
    loginBox.style.transform = "translateY(0)";
  }
}

loginBtn.onclick = function (e) {
  let isEmtyPhoneNum = phoneNum[1].value.trim() === "";
  let isEmtyPw = pw[1].value.trim() === "";

  if (isEmtyPhoneNum || isEmtyPw) {
    e.preventDefault();
    if (isEmtyPhoneNum) {
      isError(phoneNum[1], "Vui lòng nhập số điện thoại!");
    } else {
      checkPhoneNumber(phoneNum[1]);
    }
    if (isEmtyPw) {
      isError(pw[1], "Vui lòng nhập mật khẩu!");
    } else {
      checkPassword(pw[1]);
    }
  } else {
    alert('Đăng nhập thành công!');
    containerClose.style.display = "none";
    sessionStorage.setItem("loginSuccess", "true");
  }
}