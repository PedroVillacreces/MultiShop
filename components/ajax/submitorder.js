$(document).ready(function(){
$(document).on('click', '#confirm-order', function () {
    var payment = $('input[name=optradio1]:checked').attr('id');

    if (payment == 2) {
        $('#submitCartModal').modal("show");
    }

    else {
        $('#submitCartCardModal').modal("show");
        /* TODO abrir el modal de la página de tarjeta de crédito */
    }
});
});
$(document).on('click', '.submitProductCart', function () {
    var time = Math.floor(new Date().getTime()/1000);
    var subtotal = $('td.subtotal-order').html();
    var method = $('input[name=optradio]:checked').attr('id');
    var status = 1;
    var payment = 2;
    var products = [];

    $('td.item-quantity').each(function () {
        var product = new Object();
        product.id = $(this).attr('id');
        product.quantity = $(this).html();
        products.push(product);
    });
    console.log(products);
    var jsonFile = {
        "time": time,
        "subtotal": subtotal,
        "method": method,
        "status": status,
        "products": products,
        "payment" : payment
    };

    $.ajax({
        type: "POST",
        url: "controllers/shoppingcart.php",
        data: {
            submitOrderTransfer: jsonFile
        },
        dataType: "json"
    }).done(function (data) {
       if(data.message == "ok"){
           $('#submitCartModal').modal("hide");
           $('button#confirm-order').css('pointer-events', 'none');
           location.href= "shoppingcart";
       }
       else{
           alert('Su metido no ha sido formalizado, inténtelo de nuevo más tarde');
       }

    });
});

$(document).on('click', '.subscribe', function () {
    var time = Math.floor(new Date().getTime()/1000);
    var subtotal = $('td.subtotal-order').html();
    var method = $('input[name=optradio]:checked').attr('id');
    var status = 1;
    var payment = 1;
    var products = [];

    $('td.item-quantity').each(function () {
        var product = new Object();
        product.id = $(this).attr('id');
        product.quantity = $(this).html();
        products.push(product);
    });
    console.log(products);
    var jsonFile = {
        "time": time,
        "subtotal": subtotal,
        "method": method,
        "status": status,
        "products": products,
        "payment" : payment
    };

    $.ajax({
        type: "POST",
        url: "controllers/shoppingcart.php",
        data: {
            submitOrderTransfer: jsonFile
        },
        dataType: "json"
    }).done(function (data) {
        if(data.message == "ok"){
            $('#submitCartModal').modal("hide");
            $('button#confirm-order').css('pointer-events', 'none');
            location.href= "shoppingcart";
        }
        else{
            alert('Su metido no ha sido formalizado, inténtelo de nuevo más tarde');
        }

    });
});

$(document).on('click', '.payment-radio', function () {
    $('input[name=optradio1]:checked').prop('checked', false);
    $(this).prop('checked', true);
});


