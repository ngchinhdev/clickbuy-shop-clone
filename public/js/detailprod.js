const smallImgs = document.querySelectorAll(".small-img-col");
const imgDisplay = document.querySelector(".img-sh");
const imgDisplayBox = document.querySelector(".single-img");

smallImgs.forEach((item) => {
  item.onclick = function () {
    imgDisplay.src = item.querySelector("img").src;
  };
});

// Zoom effect
imgDisplayBox.addEventListener("mousemove", (e) => {
  clientX = e.clientX - imgDisplayBox.offsetLeft;
  clientY = e.clientY - imgDisplayBox.offsetTop;

  let mw = imgDisplayBox.offsetWidth;
  let mh = imgDisplayBox.offsetHeight;
  clientX = (clientX / mw) * 10;
  clientY = (clientY / mh) * 10;

  imgDisplay.style.transform = "translate(-" + clientX + "%, -" + clientY + "%) scale(1.5)";
});

imgDisplayBox.addEventListener("mouseout", (e) => {
  imgDisplay.style.transform = "scale(1)";
});


