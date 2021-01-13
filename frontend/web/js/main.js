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

    $(document).ready(function () {

        // makeMap({
        //     an: {
        //         // image: "",
        //         title: "Андижанская область",
        //         address: 'Фамилия Имя Отчество',
        //     },
        //     bu: {
        //         // image: "",
        //         title: "Бухарская область",
        //         address: 'Фамилия Имя Отчество',
        //     },
        //     tosh: {
        //         // image: "",
        //         title: "город Ташкент",
        //         address: 'Фамилия Имя Отчество'
        //     }
        // });

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
        let swiper2 = new Swiper('.swiper-container_two', {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 20,
            breakpoints: {
                '350': {
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


});

