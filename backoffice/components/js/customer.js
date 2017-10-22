function deleteCustomer(id)
{
    if (confirm('¿Estas seguro que desea eliminar al cliente?')) {
        $(this).parent().remove();
        $("#item"+id).remove();
        var deleteCustomer = new FormData();
        deleteCustomer.append("id_customer", id);

        $.ajax({
            url:"../ajax/AjaxCustomer.php",
            method: "POST",
            data: deleteCustomer,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){

            }

        });
    }

}
    

    