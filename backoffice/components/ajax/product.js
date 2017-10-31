/**
 * Ajax to show a customer by Id
 */
$(document).on('click', '.updateProductButton', function () {
    var id_product = $(this).data('id');
    $.ajax({
        url: "../backoffice/components/ajax/AjaxProduct.php",
        method: "POST",
        data: {
            getById: id_product
        },
        cache: false
    }).done(function (data) {
        var productAjax = $.parseJSON(data);
        var html =
            '<input type="hidden" id="id_product" name="id_product" value="' + productAjax.Product['0'] + '">'+
            '<div class="form-group">'+
            '<label class="control-label">Nombre</label>'+
            '<input class="form-control" name="name" id ="name" type="text" value="' + productAjax.Product["1"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Precio</label>'+
            '<input class="form-control" name ="price" id="price" type="number" value="' + productAjax.Product["2"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Descripción</label>'+
            '<input class="form-control" name="description" id="descripcion" type="text" value="' + productAjax.Product["3"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Categoría</label>'+
            '<input class="form-control" name="category" id="category" type="text" value="'+ productAjax.Product["4"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Subcategoría</label>'+
            '<input class="form-control" name="subcategory" id="subcategory" type="text" value="'+ productAjax.Product["5"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Iniciar</label>'+
            '<input class="form-control" name="start" id="start" type="text" value="'+ productAjax.Product["6"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Cantidad</label>'+
            '<input class="form-control" name="quantity" id="quantity" type="number" value="'+ productAjax.Product["7"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Descargable</label>'+
            '<input class="form-control" name="downloadable" id="downloadable" type="number" value="'+ productAjax.Product["8"] +'">'+
            '</div>';
        $('#update-modal-products').append(html);
    });
});

$(document).on('click', '.deleteProductButton', function () {
    var agree = confirm("¿Realmente desea eliminarlo? ");
    if (agree) return true ;
    return false;

});