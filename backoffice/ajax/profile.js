$(document).on('click', '.delivery-details', function () {

    var id = $(this).attr('id');
    resetDelivery();
    $('.delivery-title').append('<h3 class="modal-title text-center title-order"> Datos del Pedido Número: ' + id + '</h3>');

    if (id) {
        $.ajax({
            type: "POST",
            url: "controllers/Profile.php",
            data: {
                getDetails: id
            },
            dataType: "json"
        }).done(function (data) {
            console.log(data);

            var htmlDeliveryDetails = '<div class="col-xs-12 col-md-6 col-lg-6 pull-left delivery-body">' +
                '<div class="panel panel-default height">'+
                '<div class="panel-heading">Detalles del pedido</div>'+
                '<div class="panel-body">'+
                '<strong>'+ data.name +' ' + data.surname + ' </strong><br>'+
                ''+ data.address +'<br>'+
                ' '+ data.post_code+ '<br>'+
                '  ' + data.region + '<br>'+
                '<strong>' + data.phone + '</strong><br>'+
                '</div>'+
                '</div>'+
                '</div>';

            var htmlShipping = '<div class="col-xs-12 col-md-6 col-lg-6 pull-left delivery-shipping">' +
                '<div class="panel panel-default height">'+
                '<div class="panel-heading">Detalles del Pago y Envío</div>'+
                '<div class="panel-body">'+
                '<strong>'+ data.type +'</strong><br>'+
                ' Envío: <strong>'+ data.method +'</strong><br>'+
                '</div>'+
                '</div>'+
                '</div>';

            $('div.delivery-details').append(htmlDeliveryDetails);
            $('div.delivery-details').append(htmlShipping);

            $.each(data.product, function (key, value) {

                var productsOfDelivery = '<tr class="products-dev">'+
                    '<td class="item-name">' + value.product_name + '</td>'+
                    '<td class="text-center item-price"> ' + value.price + ' €</td>'+
                    '<td class="text-center item-quantity"> ' + value.quantity + '</td>'+
                    '<td class="text-right amount">' + value.price * value.quantity + '€</td>'+
                    '</tr>';

                $('tbody.insert-items').append(productsOfDelivery);
            });

            var priceOfDelivery = '<tr class="total-amount">' +

                '<td class="highrow"></td>'+
                '<td class="highrow"></td>'+
                '<td class="highrow text-center"><strong>Subtotal</strong></td>'+
                '<td class="highrow text-right">'+ data.amount +'€</td>'+
                '</tr>';

            $('tbody.insert-items').append(priceOfDelivery);

            var priceShipping = '<tr class="quantities-items">'+
                '<td class="emptyrow"></td>'+
                '<td class="emptyrow"></td>'+
                '<td class="emptyrow text-center"><strong>Precio Envío</strong></td>'+
                '<td class="emptyrow text-right">'+ data.price_method + '€</td>'+
                '</tr>';
            $('tbody.insert-items').append(priceShipping);

            var totalDelivery = '<tr class="prices-items">'+
                '<td class="highrow"></td>'+
                '<td class="highrow"></td>'+
                '<td class="highrow text-center"><strong>Total a Pagar</strong></td>'+
                '<td class="highrow text-right">'+ (parseInt(data.amount) + parseFloat(data.price_method)) +' €</td>'+
                '</tr>';
            $('tbody.insert-items').append(totalDelivery);
        });

        $('button#confirm-order').css('pointer-events', 'auto');

    }
});

$(document).on('click', '.formLogin', function () {

    var user_name = $("input#userLogin").val();
    var password = $("input#passwordLogin").val();
    var jsonFile = {
        'user_name': user_name,
        'passwordLogin': password
    };

        $.ajax({
            type: "POST",
            url: "controllers/login.php",
            data: {
                formLogin: jsonFile
            },
            dataType: "json"
        }).done(function (data) {
            if(data.message == "ok"){
                location.reload();
                $('.buyit').css('pointer-events', 'none');
            }
            else if(data.message == "error"){
                var message ='<div id="alert-message" class="alert alert-danger" style="margin-top: 20px;">Login incorrecto comprueba los campos</div>';
                $(".form-login").append(message);
                alertTimeout(3000);
            }
        });
});

function alertTimeout(wait){
    setTimeout(function(){
        if ($('#alert-message').length > 0) {
            $('#alert-message').remove();
        }
    }, wait);
}

function resetDelivery(){
    $("div.delivery-body").remove();
    $(".title-order").remove();
    $("div.delivery-shipping").remove();
    $("tr.quantities-items").remove();
    $("tr.total-amount").remove();
    $("tr.prices-items").remove();
    $("tr.products-dev").remove();
    $(".title-order").remove();
}

