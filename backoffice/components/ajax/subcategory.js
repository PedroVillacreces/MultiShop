/**
 * Ajax to show a subcategory by Id
 */
$(document).on('click', '.updateSubcategoryButton', function () {
    var id_subcategory = $(this).data('id');
    $.ajax({
        url: "../backoffice/components/ajax/AjaxSubcategory.php",
        method: "POST",
        data: {
            getSubcategoryById: id_subcategory
        },
        cache: false
    }).done(function (data) {
        var subcategoryAjax = $.parseJSON(data);
        var html =
            '<input type="hidden" id="id_subcategory" name="id_subcategory" value="' + subcategoryAjax.Subcategory['0'] + '">'+
            '<div class="form-group">'+
            '<label class="control-label">Nombre</label>'+
            '<input class="form-control" name="name" id ="name" type="text" value="' + subcategoryAjax.Subcategory["1"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<select name="id_category" class="form-control">';
            for(var i = 0; i<subcategoryAjax.Categories.length; i++){
                html += '<option value="'+ subcategoryAjax.Categories[i].id_category+'">' + subcategoryAjax.Categories[i].category + '</option>';
            }
            html+='</select>';
        $('#update-modal-subcategory').append(html);
    });
});

$(document).on('click', '.deleteSubcategoryButton', function () {
    var agree = confirm("¿Realmente desea eliminar esta categoría, afectará a productos que la incluyan? ");
    if (agree) return true ;
    return false;

});