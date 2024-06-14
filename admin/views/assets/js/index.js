$(document).ready(function() {

    if (window.location.search.includes("page=user")) {
        $(".container").load("views/user.php?page=user");
    } else if(window.location.search.includes("page=category")) {
        $(".container").load("views/category.php?page=category");
    } else if(window.location.search.includes("page=order")) {
        $(".container").load("views/order.php?page=order");
    } else if(window.location.search.includes("page=redundant")) {
        $(".container").load("views/redundant.php?page=redundant");
    } else if(window.location.search.includes("page=dashboard")) {
        $(".container").load("views/dashboard.php?page=dashboard");
    } else if(window.location.search.includes("page=product")){
        if(window.location.search.includes("page=product&id=1")) {
            $(".container").load("views/include/category_product.php?cate=1");
        } else if(window.location.search.includes("page=product&id=2")) {
            $(".container").load("views/include/category_product.php?cate=2");
        } else if(window.location.search.includes("page=product&id=3")) {
            $(".container").load("views/include/category_product.php?cate=3");
        } else if(window.location.search.includes("page=product&id=4")) {
            $(".container").load("views/include/category_product.php?cate=4");
        } else if(window.location.search.includes("page=product&id=5")) {
            $(".container").load("views/include/category_product.php?cate=5");
        } else if(window.location.search.includes("page=product&id=6")) {
            $(".container").load("views/include/category_product.php?cate=6");
        } else if(window.location.search.includes("page=product&id=7")) {
            $(".container").load("views/include/category_product.php?cate=7");
        } else {
            $(".container").load("views/include/category_product.php?cate=1");
        }
    } else {
        $(".container").load("views/dashboard.php?page=dashboard");
    }

    const toggleUl = $('.ctg-prod')
    const arrowRotate = $('.fa-chevron-right')

    $('.sidebar_menu > li > a').click(function(){
        $('.sidebar_menu > li.active').removeClass('active')
        $(this).parent().addClass("active")
        if ($(this).parent().hasClass('toggle')) {
            toggleUl.toggleClass('active')
            arrowRotate.toggleClass('rotate')
            $(".container").load(this.href)
            return false
        } else {
            toggleUl.removeClass('active')
        }
        $(".container").load(this.href)
        return false
    })

    $("aside .ctg-prod > li a").click(function(){
        $('aside .ctg-prod > li.active').removeClass('active');
        $(this).parent().addClass('active');
        $(".container").load(this.href)
        let href = $(this).attr("href")
        let cateId = href.split("?cate=")[1]
        $.cookie("cateId", cateId, { expires: 1 })
        return false
    })
})