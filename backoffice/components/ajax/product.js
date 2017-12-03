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

        $('input#id_product-update').val(productAjax.Product['id_product']);
        $('input#name-update').val(productAjax.Product['product_name']);
        $('input#surname-update').val(productAjax.Product['surname']);
        $('input#price-update').val(productAjax.Product['price']);
        $('input#description-update').val(productAjax.Product['description']);
        $('input#quantity-update').val(productAjax.Product['quantity']);

        $('select[name="category"]').find('option[value="'+ productAjax.Product['id_category'] +'"]').attr("selected",true);
        //$('select[name="subcategory"]').find('option[value="'+ productAjax.Product['id_subcategory'] +'"]').attr("selected",true);

        $.ajax({
            url: "../backoffice/components/ajax/AjaxSubcategory.php",
            method: "POST",
            data: {
                category: productAjax.Product['id_category']
            },
            cache: false
        }).done(function (data) {
            var subcategoryAjax = $.parseJSON(data);
                for(var i = 0; i < subcategoryAjax.length; i++){
                    $('select#subcategory-update').append('<option value="'+ subcategoryAjax[i].id_subcategory +'">'+ subcategoryAjax[i].subcategory_name+ '</option>');
                }
            $('select[name="subcategory"]').find('option[value="'+ productAjax.Product['id_subcategory'] +'"]').attr("selected",true);
        });

        if(productAjax.Product["start"] == 1){
            $('input#start-update').attr('checked', true);
        }
        else{
            $('input#start-update').attr('checked', false);
        }
        if(productAjax.Product["downloadable"] == 1){
            $('input#downloadable-update').attr('checked', true);
        }
        else{
            $('input#downloadable-update').attr('checked', false);
        }
    });
});

$('select#category').change(function () {
    var id_category = $(this).val();

    $.ajax({
        url: "../backoffice/components/ajax/AjaxSubcategory.php",
        method: "POST",
        data: {
            category: id_category
        },
        cache: false
    }).done(function (data) {

        var subAjax = $.parseJSON(data);
        $("select#subcategory").empty();
        
        for(var i = 0; i < subAjax.length; i++){
           $('select#subcategory').append('<option value="'+ subAjax[i].id_subcategory +'">'+ subAjax[i].subcategory_name+ '</option>');
        }
        $('select#subcategory').attr('disabled', false);
    });
});

$('#edit').on('hidden.bs.modal', function () {
    $(this).find("select#subcategory-update option").remove();

});

$(document).on('click', '.deleteProductButton', function () {
    var agree = confirm("¿Realmente desea eliminarlo? ");
    if (agree) return true ;
    return false;

});