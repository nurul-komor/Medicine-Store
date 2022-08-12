$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        autoWidth: false,
        loop: false,
        center: false,
        items: 5,
        loop: false,
        margin: 10,
        autoplay: false,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1,

            },
            480: {
                items: 2,

            },
            768: {
                items: 5,

            }
        }
    });
})
// preloader
$(window).on("load", function () {
    $(".preloader").fadeOut();
    $(".preloader").delay(5000).fadeOut("slow");

});