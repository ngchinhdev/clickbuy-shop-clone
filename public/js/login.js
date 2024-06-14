const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// Change bth login-regis
const formLogin = document.querySelector('.login_wr');
const formRegis = document.querySelector('.regis_wr');
const loginBtnChange = document.querySelector('.two_form-wr .btn_change .btn.login');
const regisBtnChange = document.querySelector('.two_form-wr .btn_change .btn.regis');
loginBtnChange.addEventListener('click', () => {
    regisBtnChange.classList.remove('active');
    loginBtnChange.classList.add('active');
    formRegis.classList.remove('active');
    formLogin.classList.add('active');
})
regisBtnChange.addEventListener('click', () => {
    loginBtnChange.classList.remove('active');
    regisBtnChange.classList.add('active');
    formLogin.classList.remove('active');
    formRegis.classList.add('active');
})

const regisBox = $(".container_regis");
const loginBox = $(".container_log");
const regisBtn = $(".regis-btn");
const loginBtn = $(".login-btn");
const phoneNum = $$("#phone-num");
const pw = $$("#pw");
const cfPw = $("#cf-pw");
const fullName = $('#name');

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
  if (input.value === '') {
      isError(input, 'Vui lòng nhập số điện thoại!')
      return false
  } else if (!phoneNumReg.test(input.value)) {
      isError(input, "Số điện thoại không hợp lệ!");
      isEmty = false;
  } else {
      isSuccess(input);
  }
  return isEmty;
  }

  function checkPassword(input) {
  let isEmty = true;
  if (input.value === '') {
      isError(input, 'Vui lòng nhập mật khẩu!')
      return false
  } else if (input.value.trim().length < 6) {
      isError(input, "Vui lòng nhập mật khẩu trên 5 kí tự!");
      isEmty = false;
  } else {
      isSuccess(input);
  }
  return isEmty;
  }

  function checkConfirmPass(input1, input2) {
  let isEmty = true;
  if (input2.value === '') {
      isError(input2, 'Vui lòng xác nhận mật khẩu!')
      isEmty = false
  } else if (input1.value.trim() !== input2.value.trim()) {
      isError(input2, "Mật khẩu không trùng khớp!");
      isEmty = false;
  } else {
      isSuccess(input2);
  }
  return isEmty;
  }

  regisBtn.onclick = function (e) {
      if(!checkName(fullName) || !checkPhoneNumber(phoneNum[0])|| !checkPassword(pw[0]) || !checkConfirmPass(pw[0], cfPw)){
          e.preventDefault();
          checkName(fullName) 
          checkPhoneNumber(phoneNum[0])
          checkPassword(pw[0]) 
          checkConfirmPass(pw[0], cfPw)
      } 
  }

  loginBtn.onclick = function (e) {
      if(!checkPhoneNumber(phoneNum[1])|| !checkPassword(pw[1])){
          e.preventDefault();
          checkPhoneNumber(phoneNum[1])
          checkPassword(pw[1]) 
      }
  }