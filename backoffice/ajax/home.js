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

$(document).on('click', '.view-product', function () {
    var id = $(this).attr('data-id');
    resetView();
    $.ajax({
        type: "POST",
        url: "controllers/categoriesFront.php",
        data: {
            viewProduct: id
        },
        dataType: "json"
    }).done(function (data) {

        var html = '<h4 class="view-name">' + data.Product[0].product_name +'</h4>'+
            '<p class="view-description"><strong>Descripcion: </strong>'+ data.Product[0].description +'</p>'+
            '<p class="view-price"><strong>Precio: </strong>'+ data.Product[0].price +'€</p>';
        var title = '<h3 class="modal-title text-center view-name">' + data.Product[0].product_name +'</h3>';
       $('.form-view-cart').append(html);
        $('.header-view').append(title);

    });
});

/*$(document).on('click', '#searchProduct', function () {
    var id = $('input[name=product-searched]').val();
    $.ajax({
        type: "POST",
        url: "controllers/Search.php",
        data: {
            searchProduct: id
        },
        dataType: "json"
    }).done(function (data) {
    console.log(data);

    });
});*/

function resetView(){
    $(".view-name").remove();
    $(".view-description").remove();
    $(".view-price").remove();
}

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



