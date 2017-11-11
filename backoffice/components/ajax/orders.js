/**
 * Ajax to show a customer by Id
 */
$(document).on('click', '.updateDeliveryButton', function () {
    var id_delivery = $(this).data('id');
    $.ajax({
        url: "../backoffice/components/ajax/AjaxOrders.php",
        method: "POST",
        data: {
            getDeliveryById: id_delivery
        },
        cache: false
    }).done(function (data) {
        var userAjax = $.parseJSON(data);

        var html =
            '<input type="hidden" id="id_delivery" name="id_delivery" value="' + userAjax.Order['0'] + '">'+
            '<div class="form-group">'+
            '<label class="control-label">Fecha de Pedido</label>'+
            '<input class="form-control" name="delivery_date" id ="delivery_date" type="datetime" value="' + userAjax.Order["1"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Cliente</label>'+
            '<input class="form-control" name ="id_customer" id="id_customer" type="number" value="' + userAjax.Order["2"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Total de la Factura</label>'+
            '<input class="form-control" name="amount" id="amount" type="number" value="' + userAjax.Order["3"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Tipo de Pago</label>'+
            '<input class="form-control" name="payment" id="payment" type="text" value="'+ userAjax.Order["4"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Enviado</label>'+
            '<input class="form-control" name="dispath" id="dispath" type="number" value="'+ userAjax.Order["5"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Estado</label>'+
            '<input class="form-control" name="status" id="status" type="number" value="'+ userAjax.Order["6"] +'">'+
            '</div>';
        $('#update-modal-orders').append(html);
    });
});

$(document).on('click', '.deleteOrderButton', function () {
    var agree = confirm("¿Realmente desea eliminarlo? ");
    if (agree) return true ;
    return false;

});