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

$(document).on('click', '.test',  function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
});


$(document).ready(function () {
    var url = window.location;
    $('.navbar .nav').find('.active').removeClass('active');
    $('.navbar .nav li a').each(function () {
        if (this.href == url) {
            $(this).parent().addClass('active');
        }
    });
});