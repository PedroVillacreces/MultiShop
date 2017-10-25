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

function getCustomerById(id_customer)
{
    $.ajax({
        url:"../backoffice/components/ajax/AjaxCustomer.php",
        method:"POST",
        data:{id_customer:id_customer},
        success:function(data)
        {
            var html = 
            '<div class="form-group">'
                '<input class="form-control" type="text" placeholder="'+ data.name +'">'
            '</div>'
            '<div class="form-group">'            
                '<input class="form-control " type="text" placeholder="'+ data.surname +'">'
            '</div>'
            '<div class="form-group">'            
                '<input class="form-control " type="text" placeholder=" '+ data.mail +'">'
            '</div>'
            '<div class="form-group">'            
                '<input class="form-control " type="text" placeholder=" '+ data.address +'">'
             '</div>'
            '<div class="form-group">'            
                '<input class="form-control " type="text" placeholder=" '+ data.post_code +'">'
            '</div>'
            '<div class="form-group">'            
                '<input class="form-control " type="text" placeholder=" '+ data.region +'">'
            '</div>'
            '<div class="form-group">'            
                '<input class="form-control " type="text" placeholder=" '+ data.phone +'">'
            '</div>'
            '<div class="form-group">'            
                '<input class="form-control " type="text" placeholder=" '+ data.validate +'">'
            '</div>'
            
            $('update-modal').append(html);
        }
    });
}

$('#createCustomer').on('click', '.btn-primary', function(e){
    //this code will run for all current 
    //and future elements with the class of .btn-success

    var name = $("input#name").val();
    var surname = $("input#surname").val();
    var email = $("input#email").val();
    var address = $("input#address").val();
    var pc = $("input#pc").val();
    var region = $("input#region").val();
    var phone = $("input#phone").val();
    var password = $("input#password").val();
    var password_confirmation = $("input#password_confirmation").val();

    if(password === password_confirmation)
    {
        var active = $("input#active").val();
        var jsonFile = {'name': name , 'surname':surname, 'mail':email,  'phone':phone,
        'address':address , 'post_code': pc, 'region' : region,
        'phone' : phone, 'password': password, 'validate' : active
        };

        // Use Ajax to submit form data
        $.ajax({
            type: "POST",
            url: "../backoffice/components/ajax/AjaxCustomer.php",
            async:false,
            data:  {Customer:jsonFile},           
            dataType: "json",
        }).done(function (data) {
                var htmlRow = "<tr>";
                $.each(jsonFile, function(i, item){
                    if(i !== "password" && i !== "validate")
                    {
                        htmlRow += "<td>" + item + "</td>";
                    }
                });
                htmlRow += '<td>'+
                        '<form method="post" id="formDelete">'+
                            '<button type="submit" name="id_customer" id="id_customer" class="btn btn-danger btn-sm">'+
                            '<span class="glyphicon glyphicon-trash"></span>'+
                            '</button>'+
                        '</form>'+                    
                    '</td>'+
                    '<td>'+  
                        '<form method="post" id="formUpdate">'+                
                                '<p data-placement="top" data-toggle="tooltip" title="Edit">'+
                                    '<button type="submit" name="update" id="update" class="btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit">'+
                                        '<span class="glyphicon glyphicon-pencil"></span>'+
                                    '</button>'+
                                '</p>'+
                        '</form>'+
                    '</td>'+
                '</tr>';
        $('#customersRow').append(htmlRow);    
                alert(data["returned_val"]);
        });
    }else{
        alert("Las contraseñas deben ser iguales revisales");
        $("input#password").val() = "";
        $("input#password_confirmation").val() = "";

    }
   
});

    

    