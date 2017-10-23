function deleteCustomer(id_customer)
{
    if (confirm('¿Estas seguro que desea eliminar al cliente?')) {
        $(this).parent().remove();
        $("#item"+ id_customer).remove();
        var deleteCustomer = new FormData();
        deleteCustomer.append("id_customer", id_customer);

        $.ajax({
            url:"../backoffice/components/ajax/AjaxCustomer.php",
            method:"POST",
            data:{id_customer:id_customer},
            success:function(data)
            {
                console.log(data);
            }
        });
    }

}
    

    