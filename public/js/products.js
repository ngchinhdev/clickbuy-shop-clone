const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// Array of flashsale products
const flashSaleProducts = [
  {
    photo: [
      "imgs_detail-prod/chitietss.png",
      "imgs/ava-s22ultra-scream.png",
      "imgs_detail-prod/ss1.jpg",
      "imgs_detail-prod/ss2.jpg",
      "imgs_detail-prod/ss3.jpg",
    ],
    name: "Samsung Galaxy S23 Ultra (5G) 8GB 256GB Chính Hãng",
    price: "31,990,000 ₫",
    orgPrice: "34,990,000 ₫",
    discount: "Giảm 10%",
    feedback: "(16 đánh giá)",
  },
  {
    photo: [
      "imgs_detail-prod/noibat.png",
      "imgs/avt-iphone-14-pro-tim.png",
      "imgs_detail-prod/iphone-14-pro-max-den.png",
      "imgs_detail-prod/iphone-14-pro-max-trang.png",
      "imgs_detail-prod/iphone-14-pro-max-vang.png",
    ],
    name: "iPhone 14 Pro Max 128GB chính hãng VNA",
    price: "27,890,000 ₫",
    orgPrice: "33,990,000 ₫",
    discount: "Giảm 17%",
    feedback: "(158 đánh giá)",
  },
  {
    photo: [
      "imgs_detail-prod/z0.png",
      "imgs_detail-prod/z1.png",
      "imgs_detail-prod/z2.png",
      "imgs_detail-prod/z3.png",
      "imgs_detail-prod/z4.png",
    ],
    name: "Samsung Galaxy Z Flip4 (5G) 256GB Chính hãng",
    price: "17,490,000 ₫",
    orgPrice: "23,990,000 ₫",
    discount: "Giảm 27%",
    feedback: "(48 đánh giá)",
  },
  {
    photo: [
      "imgs_detail-prod/130.png",
      "imgs_detail-prod/131.png",
      "imgs_detail-prod/132.png",
      "imgs_detail-prod/133.png",
      "imgs_detail-prod/134.png",
    ],
    name: "iPhone 13 128GB Chính hãng VNA",
    price: "17,190,000 ₫",
    orgPrice: "24,990,000 ₫",
    discount: "Giảm 31%",
    feedback: "(59 đánh giá)",
  },
  {
    photo: [
      "imgs_detail-prod/s230.png",
      "imgs_detail-prod/s231.png",
      "imgs_detail-prod/s232.webp",
      "imgs_detail-prod/s233.webp",
      "imgs_detail-prod/s234.webp",
    ],
    name: "Samsung Galaxy S23 (5G) 8GB 256GB Chính Hãng",
    price: "19,990,000 ₫",
    orgPrice: "24,990,000 ₫",
    discount: "Giảm 25%",
    feedback: "(25 đánh giá)",
  },
];

let newProds = flashSaleProducts.map((prod) => {
  return `<div class="item fl">
    <div class="pic-item">
        <img src="${prod.photo[1]}" alt="">
    </div>
    <div class="item-info">
        <h2>${prod.name}</h2>
        <span>${prod.price}</span><del>${prod.orgPrice}</del>
    </div>
    <div class="km-info">
        <span>KM</span>
        <span>Giảm 5% tối đa 500.000đ qua Kredivo</span>
    </div>
    <div class="rate_box">
        <div class="star-box">
            <i class="fa-sharp fa-solid fa-star bright"></i>
            <i class="fa-sharp fa-solid fa-star bright"></i>
            <i class="fa-sharp fa-solid fa-star bright"></i>
            <i class="fa-sharp fa-solid fa-star bright"></i>
            <i class="fa-sharp fa-solid fa-star bright"></i>
        </div>
        <div class="rate-num">
            ${prod.feedback}
        </div>
        <div class="sale-off">
            ${prod.discount}
        </div>
    </div>
        <div class="item-details">
            <div class="details">
                <ul class="">
                    <li>
                        <div class="km-icon">
                            <span class="km">KM</span>
                            <span>Giảm 5% tối đa 500.000đ qua Kredivo</span>
                        </div>
                    </li>
                    <li>
                        <div class="km-icon">
                            <span class="km">KM</span>
                            <span>Giảm tới 250.000đ khi thanh toán qua Mua ngay trả sau
                                HomePayLater(Chi tiết)</span>
                        </div>
                    </li>
                    <li>
                        <div class="km-icon">
                            <span class="km">KM</span>
                            <span>Giảm ngay 1.500.000 khi thu cũ đổi mới(Chi tiết)</span>
                        </div>
                    </li>
                    <li>
                        <div class="km-icon">
                            <span class="km">KM</span>
                            <span>Tặng ngay PMH 1.500.000 để mua Apple chính hãng(Chi tiết)</span>
                        </div>
                    </li>
                    <li>
                        <div class="km-icon">
                            <span class="km">KM</span>
                            <span>Giảm 200.000 cho học sinh, sinh viên</span>
                        </div>
                    </li>
                    <li>
                        <div class="km-icon">
                            <span class="km">KM</span>
                            <span>Hỗ trợ trả góp lãi suất 0%</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
</div> `;
});

if ($(".item_wrap")) {
  // $(".item_wrap").innerHTML = newProds;
}

// ------------------------------------------------------------------------

// Store infomation of a product to sessionStorage
const prodDetails = $$(".flash-col");
prodDetails.forEach((prod, index) => {
  prod.addEventListener("click", function () {
    const productName = prod.querySelector("h2").textContent;
    const productPrice = prod.querySelector(".item-info span").textContent;
    const discountPrice = prod.querySelector(".item-info del").textContent;

    sessionStorage.setItem("productName", productName);
    sessionStorage.setItem("productPrice", productPrice);
    sessionStorage.setItem("discountPrice", discountPrice);
    sessionStorage.setItem("mainImageProd", flashSaleProducts[index].photo[0]);
    for (let i = 1; i < 5; i++) {
      sessionStorage.setItem(`smallImageProd${i}`, flashSaleProducts[index].photo[i]);
    }
    sessionStorage.setItem("categoryProduct", "Điện thoại");

    // window.location.href = "chi-tiet-san-pham.html";
  });
});

// Display on detail product page
const detailDisplay = $("#product_wrap");
if (detailDisplay) {
  const productName = sessionStorage.getItem("productName");
  const productPrice = sessionStorage.getItem("productPrice");
  const mainImageProd = sessionStorage.getItem("mainImageProd");  
  const discountPrice = sessionStorage.getItem("discountPrice");
  let arrSmallImgs = [];
  for (let i = 1; i < 5; i++) {
    arrSmallImgs[i] = sessionStorage.getItem(`smallImageProd${i}`);
  }

  document.querySelector(".small-img1").onclick = function () {
    imgDisplay.src = mainImageProd;
  };

  detailDisplay.querySelector("h1").textContent = productName;
  detailDisplay.querySelector(".price-row .org-price").textContent = productPrice;
  detailDisplay.querySelector(".price-row .discount").textContent = discountPrice;
  detailDisplay.querySelector(".single-img img").src = mainImageProd;
  for (let i = 1; i < 5; i++) {
    detailDisplay.querySelector(`.small-img.sm${i}`).src = arrSmallImgs[i];
  }
  document.querySelector(".home_site .category").textContent = sessionStorage.getItem("categoryProduct");
}

////////////////////////////////////////////////////////////////////////
// Store info products if click on a button
const addToCartBtn = $("#product_wrap .add-cart");
if (addToCartBtn) {
  addToCartBtn.onclick = function () {
    const productImage = $("#product_wrap").querySelector(".small-img.sm1").src;
    const productName = $("#product_wrap").querySelector("h1").textContent;
    const productPrice = $("#product_wrap").querySelector(".price-row .org-price").textContent;

    let product = {
      productImage: productImage,
      productName: productName,
      productPrice: productPrice,
    };

    let cart = JSON.parse(sessionStorage.getItem("cart")) || [];

    // Check if a product with the same name already exists in the cart
    let productExists = false;
    for (let i = 0; i < cart.length; i++) {
      if (cart[i].productName === productName) {
        productExists = true;
        break;
      }
    }

    if (productExists) {
      alert("Sản phẩm này đã có sẵn trong giỏ hàng.");
    } else {
      cart.push(product);
      sessionStorage.setItem("cart", JSON.stringify(cart));
      window.location.href = "giohang.html";
    }
  };
}

// Display on the cart
const cartContainer = $("#cart_container");
if (cartContainer) {
  let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
  const prodRowWrap = $(".prod_row-wrap");
  cart.map((prod) => {
    cartItems = `
      <div class="prod_row">
        <input type="checkbox" class="check-sgl">
        <div class="prod_display">
            <img src="${prod.productImage}" alt="">
            <p>${prod.productName}</p>
        </div>
        <div class="price cvbn">
            ${prod.productPrice}
        </div>
        <div class="quantity cvbn">
            <button class="decrease">-</button>
            <input type="text" value="1" name="" id="" disabled>
            <button class="increase">+</button>
        </div>
        <div class="sum_price cvbn">
            <span>${prod.productPrice}</span>
        </div>
        <div class="delete cvbn">
            Xóa
        </div>
      </div>
  `;
    prodRowWrap.innerHTML += cartItems;
  });
}

// --------------------------------------------------------------
// APPLE - AUTHORISED RESELLER products
class appleProductsSection {
  constructor(photo, name, price, orgPrice, discount, feedback) {
    this.photo = photo;
    this.name = name;
    this.price = price;
    this.orgPrice = orgPrice;
    this.discount = discount;
    this.feedback = feedback;
  }
}

appleProductsSection[0] = new appleProductsSection(
  "imgs/avt-iphone-14-tim.png",
  "iPhone 14 Pro Max 256GB chính hãng VNA",
  "30,690,000 ₫",
  "37,990,000 ₫",
  "Giảm 19%",
  "(59 đánh giá)"
);

appleProductsSection[1] = new appleProductsSection(
  "imgs/avt-iphone-14-pro-tim.png",
  "iPhone 14 Pro Max 128GB chính hãng VNA",
  "27,890,000 ₫",
  "33,990,000 ₫",
  "Giảm 18%",
  "(158 đánh giá)"
);

appleProductsSection[2] = new appleProductsSection(
  "imgs_detail-prod/iphone-14-pro-max-trang.png",
  "iPhone 14 Pro 128GB chính hãng VNA",
  "25,390,000 ₫",
  "31,990,000 ₫",
  "Giảm 21%",
  "(48 đánh giá)"
);

appleProductsSection[3] = new appleProductsSection(
  "imgs_detail-prod/iphone-14-pro-max-den.png",
  "iPhone 14 Pro Max 256GB chính hãng VNA",
  "30,690,000 ₫",
  "37,990,000 ₫",
  "Giảm 16%",
  "(59 đánh giá)"
);

appleProductsSection[4] = new appleProductsSection(
  "imgs/avt-iphone-13-xanh-la.png",
  "iPhone 13 128GB Chính hãng VN/A",
  "10,490,000 ₫",
  "14,990,000 ₫",
  "Giảm 25%",
  "(259 đánh giá)"
);

appleProductsSection[5] = new appleProductsSection(
  "imgs_detail-prod/iphone-14-pro-max-den.png",
  "iPhone 14 Pro Max 256GB chính hãng VNA",
  "30,690,000 ₫",
  "37,990,000 ₫",
  "Giảm 19%",
  "(59 đánh giá)"
);

appleProductsSection[6] = new appleProductsSection(
  "imgs/avt-iphone-14-xanh.png",
  "iPhone 14 Pro Max 128GB chính hãng VNA",
  "22,490,000 ₫",
  "28,490,000 ₫",
  "Giảm 17%",
  "(158 đánh giá)"
);

appleProductsSection[7] = new appleProductsSection(
  "imgs/avt-iphone-14-pro-vang.png",
  "iPhone 14 Pro 128GB chính hãng VNA",
  "25,390,000 ₫",
  "31,990,000 ₫",
  "Giảm 21%",
  "(69 đánh giá)"
);

appleProductsSection[8] = new appleProductsSection(
  "imgs/avt-iphone-14-pro-tim.png",
  "iPhone 14 Pro Max 256GB chính hãng VNA",
  "30,690,000 ₫",
  "37,990,000 ₫",
  "Giảm 19%",
  "(109 đánh giá)"
);

appleProductsSection[9] = new appleProductsSection(
  "imgs/avt-iphone-11-tim.png",
  "iPhone 11 64GB Chính hãng VN/A",
  "10,490,000 ₫",
  "15,990,000 ₫",
  "Giảm 25%",
  "(257 đánh giá)"
);

function displayAppleProds(firstindex, lastIndex, container) {
  let appleProductsDisplay = [];
  for (let i = firstindex; i < lastIndex; i++) {
    appleProductsDisplay += `<div class="item wider-2">
      <div class="pic-item">
          <img src="${appleProductsSection[i].photo}" alt="">
      </div>
      <div class="item-info">
          <h2>${appleProductsSection[i].name}</h2>
          <span>${appleProductsSection[i].price}</span><del>${appleProductsSection[i].orgPrice}</del>
      </div>
      <div class="km-info">
          <span>KM</span>
          <span>Giảm 5% tối đa 500.000đ qua Kredivo</span>
      </div>
      <div class="rate_box mar">
          <div class="star-box">
              <i class="fa-sharp fa-solid fa-star bright"></i>
              <i class="fa-sharp fa-solid fa-star bright"></i>
              <i class="fa-sharp fa-solid fa-star bright"></i>
              <i class="fa-sharp fa-solid fa-star bright"></i>
              <i class="fa-sharp fa-solid fa-star"></i>
          </div>
          <div class="rate-num">
              ${appleProductsSection[i].feedback}
          </div>
          <div class="sale-off">
              ${appleProductsSection[i].discount}
          </div>
      </div>
      <div class="item-details">
          <div class="details">
              <ul class="">
                  <li>
                      <div class="km-icon">
                          <span class="km">KM</span>
                          <span>Giảm 5% tối đa 500.000đ qua Kredivo</span>
                      </div>
                  </li>
                  <li>
                      <div class="km-icon">
                          <span class="km">KM</span>
                          <span>Giảm tới 250.000đ khi thanh toán qua Mua ngay trả sau
                              HomePayLater(Chi tiết)</span>
                      </div>
                  </li>
                  <li>
                      <div class="km-icon">
                          <span class="km">KM</span>
                          <span>Giảm ngay 1.500.000 khi thu cũ đổi mới(Chi tiết)</span>
                      </div>
                  </li>
                  <li>
                      <div class="km-icon">
                          <span class="km">KM</span>
                          <span>Tặng ngay PMH 1.500.000 để mua Apple chính hãng(Chi tiết)</span>
                      </div>
                  </li>
                  <li>
                      <div class="km-icon">
                          <span class="km">KM</span>
                          <span>Giảm 200.000 cho học sinh, sinh viên</span>
                      </div>
                  </li>
                  <li>
                      <div class="km-icon">
                          <span class="km">KM</span>
                          <span>Hỗ trợ trả góp lãi suất 0%</span>
                      </div>
                  </li>
              </ul>
          </div>
      </div>
    </div>`;
  }
  // container.innerHTML = appleProductsDisplay;
}

const appleSectionFirst = $("#apple_seller .item_wrap.wider-prod.row1");
const appleSectionSecond = $("#apple_seller .item_wrap.wider-prod.row2");

displayAppleProds(0, 5, appleSectionFirst);
displayAppleProds(5, 10, appleSectionSecond);
