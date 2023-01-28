var $ = jQuery.noConflict();




$(".detail-block .icon-box.fir").mouseover(function() {
    $(".detail-block .icon-box img.first").addClass("d-none");
    $(".detail-block .icon-box img.sec").removeClass("d-none");
});

$(".detail-block .icon-box").mouseout(function() {
    $(".detail-block .icon-box img.sec").addClass("d-none");
    $(".detail-block .icon-box img.first").removeClass("d-none");
});



$(".detail-block .icon-box.sec").mouseover(function() {
    $(".detail-block .icon-box img.tri").addClass("d-none");
    $(".detail-block .icon-box img.for").removeClass("d-none");
});
$(".detail-block .icon-box.sec").mouseout(function() {
    $(".detail-block .icon-box img.for").addClass("d-none");
    $(".detail-block .icon-box img.tri").removeClass("d-none");
});

$(".detail-block .icon-box.thi").mouseover(function() {
    $(".detail-block .icon-box img.fiv").addClass("d-none");
    $(".detail-block .icon-box img.six").removeClass("d-none");
});
$(".detail-block .icon-box.thi").mouseout(function() {
    $(".detail-block .icon-box img.six").addClass("d-none");
    $(".detail-block .icon-box img.fiv").removeClass("d-none");
});

$(".detail-block .icon-box.for").mouseover(function() {
    $(".detail-block .icon-box img.sev").addClass("d-none");
    $(".detail-block .icon-box img.eig").removeClass("d-none");
});
$(".detail-block .icon-box.for").mouseout(function() {
    $(".detail-block .icon-box img.eig").addClass("d-none");
    $(".detail-block .icon-box img.sev").removeClass("d-none");
});

$(".detail-block .icon-box.fiv").mouseover(function() {
    $(".detail-block .icon-box img.nin").addClass("d-none");
    $(".detail-block .icon-box img.ten").removeClass("d-none");
});
$(".detail-block .icon-box.fiv").mouseout(function() {
    $(".detail-block .icon-box img.ten").addClass("d-none");
    $(".detail-block .icon-box img.nin").removeClass("d-none");
});

$(".detail-block .icon-box.six").mouseover(function() {
    $(".detail-block .icon-box img.ele").addClass("d-none");
    $(".detail-block .icon-box img.tel").removeClass("d-none");
});
$(".detail-block .icon-box.six").mouseout(function() {
    $(".detail-block .icon-box img.tel").addClass("d-none");
    $(".detail-block .icon-box img.ele").removeClass("d-none");
});
$('.test-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
});
//Single Item Carousel
if ($('.single-item-carousel').length) {
    $('.single-item-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        smartSpeed: 500,
        autoplay: 5000,
        autoplayTimeout: 5000,
        navText: ['<span class="icon flaticon-back"></span>', '<span class="icon flaticon-next"></span>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            800: {
                items: 1
            },
            1024: {
                items: 1
            }
        }
    });
}