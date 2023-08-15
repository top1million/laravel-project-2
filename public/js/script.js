$(document).ready(function () {

    // banner owl carousel
    $(".owl-carousel").owlCarousel({
        dots: true, items: 1, loop: true, autoplay: true,
        nav : true,
    });

    //     /cars/{id}/images
    $(".buttonCk").click("click", function () {
        var confirm = window.confirm('Are you sure you want to delete this image?');
        if (confirm) {
            var id = $(this).attr('id');

            $.ajax({
                type: 'GET', url: '/cars/' + id + '/images', success: function (data) {
                    $('#' + id).parent().remove();
                }


            })


        }
    });


});



