$(".dropdown-toggle").click(function(){
    $(".dropdown-menu").slideToggle("fast");
    $("#menu1 span.arrow-way").toggleClass("glyphicon glyphicon-chevron-down");
    $("#menu1 span.arrow-way").toggleClass("glyphicon glyphicon-chevron-up");

});

$(document).ready(function () {

    $('.star').on('click', function () {
        $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
        $(this).parents('tr').toggleClass('selected');
    });

    $('.order-filter').on('click', function () {
        var $target = $(this).data('target');
        if ($target != 'all') {
            $('.table tr.orders').css('display', 'none');
            $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
        } else {
            $('.table tr.orders').css('display', 'none').fadeIn('slow');
        }
    });

});