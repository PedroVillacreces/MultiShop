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
        $('input#id_subcategory-update').val(subcategoryAjax.Subcategory['0']);
        $('input#name-update').val(subcategoryAjax.Subcategory['1']);
        $('select[name="category"]').find('option[value="'+ subcategoryAjax.Subcategory['id_category'] +'"]').attr("selected",true);
    });
});

$(document).on('click', '.deleteSubcategoryButton', function () {
    var agree = confirm("¿Realmente desea eliminar esta categoría, afectará a productos que la incluyan? ");
    if (agree) return true ;
    return false;

});