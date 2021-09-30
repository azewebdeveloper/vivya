if($('div').hasClass('brends')) {
    $('.brends').owlCarousel({
        startPosition: 0,
        autoplayHoverPause:true,
        margin: 10,
        stagePadding: 0,
        loop: true,
        autoplay: true,
        navs: true,
        pagination :true,
        autoplayTimeout:6000,
        responsiveClass:true,
        responsive:{
            0:{
                items:4
            },
            600:{
                items:5
            },
            1000:{
                items:10,
            }
        }
    })
}

var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    loop: true,
    autoplay: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

if($('div').hasClass('main_products')) {
    $('.main_products').owlCarousel({
        startPosition: 0,
        autoplayHoverPause:true,
        margin: 10,
        stagePadding: 0,
        loop: true,
        autoplay: true,
        navs: false,
        pagination :true,
        autoplayTimeout:3000,
        responsiveClass:true,
        owlDots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            768:{
                items:3
            },
            1000:{
                items:4,
            }
        }
    })
}

const activeImage = document.querySelector(".product-image .active");
const productImages = document.querySelectorAll(".product-thumb img");
function changeImage(e) {
    activeImage.src = e.target.src;
}
productImages.forEach((image) => image.addEventListener("click", changeImage));




$('.termsId').click(function () {
    if (!$('#terms').prop('checked')) {
        $('#subway').attr('disabled','true')
        $('#address').show()
        $('#adres').removeAttr('disabled')
    }else {
        $('#subway').removeAttr('disabled')
        $('#address').hide()
        $('#adres').attr('disabled','true')
    }
})

$('.mob-icon i').click(function () {
    $('.left-menu').animate({left:0},300)
})

$('.close-menu i').click(function () {
    $('.left-menu').animate({left: '-100%'},300)
})
