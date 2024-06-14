// ACTION IN THE CART SECTION
const selectAll = document.querySelectorAll(".select-all");
const selectSgls = document.querySelectorAll(".check-sgl");
const checkBoxBtns = document.querySelectorAll("input[type = checkbox]");
const sumSelect = document.querySelector(".sum-select span");
const sumPayProd = document.querySelector(".right-site > p");
const checkedProd = document.querySelectorAll("input[type = checkbox]:not(.select-all)");
const decreaseBtn = document.querySelectorAll("input.decrease");
const increaseBtn = document.querySelectorAll("input.increase");
const quantityProds = document.querySelectorAll(".quantity > input");
const numCart = document.querySelector("#header .cart");

// Display the number of products in cart
function sumSelectNum() {
  if (sumSelect) {
    sumSelect.textContent = selectSgls.length;
  }
}
sumSelectNum();

// function to check all and count products
function checkAll(arrCheckBoxBtns) {
  arrCheckBoxBtns.forEach((item) => {
    item.checked = true;
  });
  checkedCount();
  sumMoneyMustPay();
}

// function to uncheck all and count products
function unCheckAll(arrCheckBoxBtns) {
  arrCheckBoxBtns.forEach((item) => {
    item.checked = false;
  });
  checkedCount();
  sumMoneyMustPay();
}

//  CLick on CheckAll checkboxes to CheckAll and UncheckAll products
selectAll.forEach((item) => {
  item.onclick = function () {
    if (this.checked === true) {
      checkAll(checkBoxBtns);
    } else {
      unCheckAll(checkBoxBtns);
    }
  };
});

// Checkall button will be checked if all products is checked
function checkAllBoxIfSatisfy() {
  if (checkedCount() === selectSgls.length) {
    selectAll.forEach((item) => {
      item.checked = true;
    });
  }
}

// Click on single checkbox to check or uncheck product and sum price
selectSgls.forEach((item) => {
  item.addEventListener("click", function () {
    if (this.checked === false) {
      selectAll.forEach((item) => {
        item.checked = false;
      });
    }
    checkedCount();
    sumMoneyMustPay();
    checkAllBoxIfSatisfy();
  });
});

// function to count how many checkboxes are checked
function checkedCount() {
  let count = 0;
  checkedProd.forEach((item) => {
    if (item.checked) {
      count++;
    }
    document.querySelector(".right-site #count").textContent = count;
  });
  return count;
}

let priceOrgs = document.querySelectorAll(".price");
let sumCols = document.querySelectorAll(".sum_price");

// Remove character that is not a number
function numberReg(value) {
  return Number(value.toString().replace(/\D+/g, ""));
}

// / Exchange the number to Vietnamese currency
function currencyExchange(value) {
  return value.toLocaleString("vi-VN", {
    style: "currency",
    currency: "VND",
  });
}

// Total amount to be paid
function sumMoneyMustPay() {
  let sum = 0;
  for (let i = 0; i < checkedProd.length; i++) {
    if (checkedProd[i].checked) {
      price = numberReg(sumCols[i].textContent);
      sum += price;
    }
    document.querySelector(".right-site #price-fi").innerText = currencyExchange(sum);
  }
  return currencyExchange(sum);
}




