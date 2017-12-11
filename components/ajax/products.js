$(document).ready(function() {
    var first = getUrlVars()["idCat"];
    var second = getUrlVars()["idSubc"];
    var third = getUrlVars()["name"];

    var jsonFile = {
        'idCategory': first,
        'idSubcategory': second,
        'name' : third
    };
    $.ajax({
        type: "POST",
        url: "controllers/categories.php",
        data: {
            idsCatSub: jsonFile

        },
        dataType: "json"
    }).done(function (data) {
        var title = "";
        if(data.category){
            title = '<h2>Productos por Categoría: <strong>' + data.category + '</strong></h2>';
        }
        else{
            title = '<h2>Productos por SubCategoría: <strong>' + data.subcategories + '</strong></h2>';
        }
        $("h2.CatSubProducts").html(title);

        for (var i = 0; i < data.products.length; i++) {

            var picture = data.products[i].picture ? data.products[i].picture : "multimedia/images/products/dummy.jpg";
            var htmlProducts = '<div class="col-sm-6 col-md-4" style="margin-bottom: 20px; margin-top: 20px;">' +
                '<div class="thumbnail">' +
                '<h3>' + data.products[i].product_name + '</h3>' +
                '<img src="backoffice/' + picture + '" alt="Producto">' +
                '<div class="caption">' +
                '<p>' + data.products[i].price + '€</p>' +
                '<div class="toolAdd">' +
                '<div class="numbers-row">'+
                '<input type="text" name="french-hens" id="buttonsincre" value="1">'+
                '</div>'+
                '<button type="submit" id="'+data.products[i].id_product+'" class="btn btn-primary buyit" role="button" style="background-color:#222; border-color:#222;">Comprar</button>' +
                '<button class="btn btn-default" role="button">Ver Ficha</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            var referenceDiv = $("div.products");
            referenceDiv.append(htmlProducts);
            disabledButton();
        }
        counterButton();
    });
});

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');

        if($.inArray(hash[0], vars)>-1)
        {
            vars[hash[0]]+=","+hash[1];
        }
        else
        {
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
    }

    return vars;
}


function disabledButton(){
    if(typeof session == "undefined"){
        $('button.buyit').css('pointer-events', 'none');
        $('div.toolAdd').attr("data-toggle", "tooltip");
        $('div.toolAdd').attr("title", "Logueate para Añadir");
    }
}

function counterButton() {
    $(".numbers-row").append('<div class="inc buttonupdown img-circle">+</div><div class="dec buttonupdown img-circle">-</div>');

    $(".buttonupdown").on("click", function() {

        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }

        $button.parent().find("input").val(newVal);

    });
}
