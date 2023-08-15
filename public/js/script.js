$(document).ready(function () {

    // banner owl carousel
    $(".owl-carousel").owlCarousel({
        dots: true, items: 1, loop: true, autoplay: true, nav: true,
    });

    //     /cars/{id}/images
    $(".buttonCk").click("click", function (e) {
        e.preventDefault();
        var confirm = window.confirm('Are you sure you want to delete this image?');
        if (confirm) {
            var id = $(this).attr('id');
            $('#' + id).parent().remove();
            //     carIds get and put the value of id in  it
            var carIds = $('#carIds').val();
            carIds = carIds  + id + ',';
            $('#carIds').val(carIds);
            console.log(carIds);
        }
    });


})




