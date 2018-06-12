$(document).on('click', '.header-click', function () {

    $.ajax({
        type: "POST",
        url: "controllers/categoriesFront.php",
        data: {
            header: "header"
        },
        dataType: "json"
    }).done(function (data) {
        reset();
        for(var i = 0; i < data.length; i++){

            if (data[i].subcategories.length != 0){
            var htmlCategories = '<li class="dropdown-submenu"><a id="' + data[i].id_category + '" class="cat" tabindex="-1" href="products?idCat='+ data[i].id_category +'">' + data[i].category + '</a>' +
                                '<ul class="drop-sub dropdown-menu dropdown-menu-' + data[i].id_category + '">'+
                                '</ul>';

            $('ul.multi-level').append(htmlCategories);

                for(var j = 0; j < data[i].subcategories.length ; j++){
                    var htmlSubCategories =
                            '<li><a id="'+ data[i].subcategories[j].id_subcategory +'" tabindex="-1" href="products?idSubc='+ data[i].subcategories[j].id_subcategory+'">' + data[i].subcategories[j].subcategory_name + '</a></li>';
                            var classDropdown = "ul.dropdown-menu-" + data[i].id_category;
                            $(classDropdown).append(htmlSubCategories);
                }
            }

            else{
                var htmlCategories = '<li class="catg"><a id="' + data[i].id_category + '" class="cat" href="products">' + data[i].category + '</a></li>';
                $("ul.multi-level ").append(htmlCategories);
            }
        }

        console.log(data);
    });
});

function reset(){
    $("li.dropdown-submenu").remove();
    $("li.catg").remove();
    $("ul.drop-sub").remove();
}


$(document).on('click', '.pay-method', function () {
    var price =  $(this).val();
    $('td.price-method').html(price+ "€");
    var subtotal = parseInt($('td.subtotal-order').html());
    var total = parseFloat(price) + parseFloat(subtotal);
    $('td.total-order').html(total+ "€");

});

$(document).on('click', '.idDelete', function () {

    var id =  $(this).attr('id');
    $('input.hidden-id').val(id);

});

$(document).on('click', '.formDeleteProductCart', function () {

    var id = $('input.hidden-id').val();
    var quantity = $('input#quantity-delete').val();

    var jsonFile = {
        "id_product" : id,
        "quantityDelete" : quantity
    };

    $.ajax({
        type: "POST",
        url: "controllers/shoppingcart.php",
        data: {
            deleteFromCart: jsonFile
        },
        dataType: "json"
    }).done(function (data) {
        if(data.message == "error"){

            var message ='<div id="alert-message" class="alert alert-danger" style="margin-top: 20px;">No puede introducir un número superior al que tiene en el carrito</div>';
            $(".form-delete-cart").append(message);
        }
        else{
        location.href = "shoppingcart";
        }
    });

});