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
        $('input#id_order-update').val(userAjax.Order['0']);
        $('select[name="payment"]').find('option[value="'+ userAjax.Order['id_payment'] +'"]').attr("selected",true);
        $('select[name="dispath"]').find('option[value="'+ userAjax.Order['id_dispath'] +'"]').attr("selected",true);
        $('select[name="status"]').find('option[value="'+ userAjax.Order['id_status'] +'"]').attr("selected",true);
    });
});

$(document).on('click', '.deleteOrderButton', function () {
    var agree = confirm("¿Realmente desea eliminarlo? ");
    if (agree) return true ;
    return false;

});