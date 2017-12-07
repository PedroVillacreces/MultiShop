$(".dropdown-toggle").click(function(){
    $(".dropdown-menu").slideToggle("fast");
    $("#menu1 span.arrow-way").toggleClass("glyphicon glyphicon-chevron-down");
    $("#menu1 span.arrow-way").toggleClass("glyphicon glyphicon-chevron-up");

});

