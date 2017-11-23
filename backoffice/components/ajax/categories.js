/**
 * Ajax to show a category by Id
 */
$(document).on('click', '.updateCategoryButton', function () {
    var id_category = $(this).data('id');
    $.ajax({
        url: "../backoffice/components/ajax/AjaxCategories.php",
        method: "POST",
        data: {
            getCategoryById: id_category
        },
        cache: false
    }).done(function (data) {
        var categoryAjax = $.parseJSON(data);
        var html =
            '<input type="hidden" id="id_category" name="id_category" value="' + categoryAjax.Category['0'] + '">'+
            '<div class="form-group">'+
            '<label class="control-label">Nombre</label>'+
            '<input class="form-control" name="name" id ="name" type="text" value="' + categoryAjax.Category["1"] +'">'+
            '</div>';
        $('#update-modal-category').append(html);
    });
});

$(document).on('click', '.deleteCategoryButton', function () {
    var agree = confirm("¿Realmente desea eliminar esta categoría, afectará a productos que la incluyan? ");
    if (agree) return true ;
    return false;

});