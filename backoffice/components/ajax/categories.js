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
        $('input#id_category-update').val(categoryAjax.Category['0']);
        $('input#name-update').val(categoryAjax.Category['1']);
    });
});

$(document).on('click', '.deleteCategoryButton', function () {
    var agree = confirm("¿Realmente desea eliminar esta categoría, afectará a productos que la incluyan? ");
    if (agree) return true ;
    return false;

});