$(document).on('click', '.buyit', function () {
    var idProduct = $(this).attr('id');
    var quantity = $('input#buttonsincre').val();

    var jsonFile ={
        "id_product" : idProduct,
        "quantity" : quantity
    };
    $.ajax({
        type: "POST",
        url: "controllers/shoppingcart.php",
        data: {
            buyProduct: jsonFile
        },
        dataType: "json"
    }).done(function (data) {
        var counter = 0;
        if(typeof data.length == "undefined"){
            counter = 1;
        }
        else{
            counter = data.length;
        }
        $('.badge').html(counter);
        $('button#confirm-order').css('pointer-events', 'auto');

    });
});

$(document).on('click', '.search-product', function () {
    var ProductName = $('input.product-searched').val();

    $.ajax({
        type: "POST",
        url: "controllers/categories.php",
        data: {
            searchProduct: ProductName
        },
        dataType: "json"
    }).done(function (data) {

    });
});


$(function () {
    if(typeof session == "undefined"){
        $('div.toolAdd').attr("data-toggle", "tooltip");
        $('div.toolAdd').attr("title", "Logueate para Añadir");
    }
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$(function() {

    $(".numbers-row").append('<div class="inc buttonupdown img-circle">+</div><div class="dec buttonupdown img-circle">-</div>');

    $(".buttonupdown").on("click", function() {

        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }

        $button.parent().find("input").val(newVal);

    });

});
