$(document).ready(function () {

    // banner owl carousel
    $(".owl-carousel").owlCarousel({
        dots: true, items: 1, loop: true, autoplay: true
    });
    $(".buttonCk").click(function () {
        console.log("click");
    })


});


$(".buttonCk").click("click", function () {
    alert("click");
});
