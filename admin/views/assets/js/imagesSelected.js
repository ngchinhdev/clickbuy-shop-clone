$(document).ready(function() {
    let fileInputProd = $("#images")

        fileInputProd.on("change", function() {
        let selectedFiles = fileInputProd[0].files

        $(".box.img .right-site").empty();

        for(let i = 0; i < selectedFiles.length; i++) {
            let file = selectedFiles[i]
            let reader = new FileReader()

            reader.onload = (function(file) {
                return function(e) {
                    let img = document.createElement('img')
                    img.className = 'img-choose'
                    img.src = e.target.result

                    $(".box.img .right-site").append(img)
                }
            })(file)
            reader.readAsDataURL(file)
        }
    })

    let fileInputUser = $("#user-avt")

        fileInputUser.on("change", function() {
        let selectedFiles = fileInputUser[0].files

        for(let i = 0; i < selectedFiles.length; i++) {
            let file = selectedFiles[i]
            let reader = new FileReader()

            $('.usus').remove()

            reader.onload = (function(file) {
                return function(e) {
                    let img = document.createElement('img')
                    img.className = 'usus'
                    img.src = e.target.result

                    $(".box.img").append(img)
                }
            })(file)
            reader.readAsDataURL(file)
        }
    })
})