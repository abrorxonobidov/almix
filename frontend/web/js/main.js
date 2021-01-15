window.onscroll = function () {
    myFunction()
};

let header = document.getElementById("headMenu");
let headMenuFixed = header.offsetTop;

function myFunction() {
    if (window.pageYOffset >= headMenuFixed) {
        header.classList.add("headMenuFixed");
    } else {
        header.classList.remove("headMenuFixed");
    }
}

$(document).ready(function () {

    $('a[href^="#"]').on("click", function (event) {
        event.preventDefault();
    });

    $('.head_menu .dropdown').hover(function () {
        $(this).addClass('open');
    }, function () {
        $(this).removeClass('open');
    });
    $('.head_menu .dropup').hover(function () {
        $(this).addClass('open');
    }, function () {
        $(this).removeClass('open');
    });

    $("#actual_news_slider").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 7000,
        nav: true,
        animateOut: 'fadeOut',
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        },
        navigation: true,
        pagination: true
    });
    var swiper2 = new Swiper('.swiper-container_two', {
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 20,
        breakpoints: {
            '991': {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            '767': {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            '500': {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            '350': {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            '300': {
                slidesPerView: 1,
                spaceBetween: 20,
            },
        },
    });
    let grid = $('.grid').imagesLoaded(function () {
        grid.masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-sizer'
        });
    });


});

