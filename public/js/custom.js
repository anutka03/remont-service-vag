$(document).ready(function () {
    $('.markiblock-slider').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 6,
        autoplay: false,
        lazyLoad: 'progressive',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });

    $('.markiblock-btn').click(function (event) {
        $('.markiblock-btn-s1').slideToggle(10);
        $('.markiblock-btn-s2').slideToggle(10);
        $('.markiblock-spis').slideToggle(1000);
        $('.markiblock-slider').slideToggle(500);
    });
});