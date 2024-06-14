const numOnCart = sessionStorage.getItem("numOnCart");
document.querySelector("#header .cart p").textContent = numOnCart;

