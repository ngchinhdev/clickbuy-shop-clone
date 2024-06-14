const banner = document.querySelector(".above_banner");
const imgItems = document.querySelectorAll(".img_item");
const preBtn = document.querySelector(".pre-btn");
const nextBtn = document.querySelector(".next-btn");
const butSildes = document.querySelectorAll(".but-slide");

let imgItemWidth = imgItems[0].offsetWidth;
let currentIndex = 0;

nextBtn.addEventListener("click", function () {
  if (currentIndex < imgItems.length - 1) {
    moveSlide(currentIndex + 1);
  } else {
    moveSlide(0);
  }
});

preBtn.addEventListener("click", function () {
  if (currentIndex > 0) {
    moveSlide(currentIndex - 1);
  } else {
    moveSlide(imgItems.length - 1);
  }
});

function moveSlide(index) {
  currentIndex = index;
  banner.style = `transform: translateX(-${index * imgItemWidth}px)`;
  document.querySelector(".red-line.active").classList.remove("active");
  butSildes[currentIndex].classList.add("active");
}

butSildes.forEach((but, index) => {
  but.onclick = function () {
    moveSlide(index);
  };
});

let i = 0;
setInterval(function () {
  if (i >= 4) {
    i = 0;
    moveSlide(i);
  } else {
    moveSlide(++i);
  }
}, 2000);
