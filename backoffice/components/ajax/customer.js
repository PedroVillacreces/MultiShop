$(document).on("click", '.deleteButton', function() {
    event.preventDefault();
    if (confirm('¿Estas seguro que desea eliminar al cliente?')) {
        var id_customer = $(this).data('id');

        $.ajax({
            url:"../backoffice/components/ajax/AjaxCustomer.php",
            method:"POST",
            data:{id_customer:id_customer},
            cache: false,
        }).done(function (data) {            
              if(data === "ok")
              {
                $(this).parent().remove();                
                $("#item"+ id_customer).remove();
                var deleteCustomer = new FormData();
                deleteCustomer.append("id_customer", id_customer);        
              }
              else
              {
                alert("No se pudo llevar a cabo el borrado");
              }
            
        });
    }
});    
   

$(document).on('click', '.updateButton', function(){
    var id_customer = $(this).data('id');
    $.ajax({
        url:"../backoffice/components/ajax/AjaxCustomer.php",
        method:"POST",
        data:{updateAjax:id_customer},
        cache: false,
    }).done(function (data) {
        var customerAjax = $.parseJSON(data); 
            var html = 
            '<div class="form-group">'+
                '<label class="control-label">Nombre</label>'+
                '<input class="form-control" type="text" placeholder="'+ customerAjax.Customer["name"] +'" value="' + customerAjax.Customer["name"] +'">'+
            '</div>'+
            '<div class="form-group">'+
                '<label class="control-label">Apellidos</label>'+            
                '<input class="form-control " type="text" placeholder="'+ customerAjax.Customer["surname"] +'" value="' + customerAjax.Customer["surname"] +'">'+
            '</div>'+
            '<div class="form-group">'+
                '<label class="control-label">Email</label>'+            
                '<input class="form-control " type="text" placeholder=" '+ customerAjax.Customer["mail"] +'" value="' + customerAjax.Customer["mail"] +'">'+
            '</div>'+
            '<div class="form-group">'+
                '<label class="control-label">Dirección</label>'+            
                '<input class="form-control " type="text" placeholder=" '+ customerAjax.Customer["address"] +'" value="'+ customerAjax.Customer["address"] +'">'+
             '</div>'+
            '<div class="form-group">'+   
                '<label class="control-label">Código Postal</label>'+         
                '<input class="form-control " type="text" value="'+ customerAjax.Customer["post_code"] +'">'+
            '</div>'+
            '<div class="form-group">'+
                '<label class="control-label">Nombre</label>'+
                '<input class="form-control " type="text" value="'+ customerAjax.Customer["region"] +'">'+
            '</div>'+
            '<div class="form-group">'+     
                '<label class="control-label">Teléfono</label>'+       
                '<input class="form-control " type="text" value="'+ customerAjax.Customer["phone"] +'">'+
            '</div>'+
            '<div class="form-group">'+      
                '<label class="control-label">Contraseña</label>'+      
                '<input class="form-control " type="text" value="'+ customerAjax.Customer["password"] +'">'+
            '</div>';            
            $('#update-modal').append(html);
    });
});        

$(document).on('click', '.createButton', function(){
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
        var jsonFile = {'name':name , 'surname':surname, 'mail':email,
        'address':address , 'post_code':pc, 'region':region,  'phone':phone,
        'password':password, 'validate':active
        };

        
        $.ajax({
            type: "POST",
            url: "../backoffice/components/ajax/AjaxCustomer.php",
            data:  {Customer:jsonFile},           
            dataType: "json",
        }).done(function (data) {
            if(data['id'])
            {            
                var htmlRow = "<tr id='item" + data['id'] +"' >;"
                $.each(jsonFile, function(i, item){
                    if(i !== "password" && i !== "validate")
                    {
                        htmlRow += "<td>" + item + "</td>";
                    }
                });
                htmlRow += '<td>'+
                        '<form role="form" method="POST" id="deleteCustomer">'+
                            '<button type="button" name="deleteCustomer" id="deleteCustomer" class="deleteButton btn btn-danger btn-sm" data-id="'+ data['id'] +'">'+
                            '<span class="glyphicon glyphicon-trash"></span>'+
                            '</button>'+
                        '</form>'+                    
                    '</td>'+
                    '<td>'+  
                        '<form role="form" method="POST" id="updateCustomer">'+                
                                '<p data-placement="top" data-toggle="tooltip" title="Edit">'+
                                    '<button type="button" name="updateCustomer" id="updateCustomer" class="updateButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit"  data-id="'+ data['id'] +'">'+
                                        '<span class="glyphicon glyphicon-pencil"></span>'+
                                    '</button>'+
                                '</p>'+
                        '</form>'+
                    '</td>'+
                '</tr>';
                    $('#customersRow').append(htmlRow);    
                            alert(data["returned_val"]);
                            $('#modalCreate').modal('hide');
            }else{
                alert("El email introducido ya existe");
            }
        });
       

    }else{
        alert("Las contraseñas deben ser iguales revisales");
        $("input#password").val() = "";
        $("input#password_confirmation").val() = "";
    }   
});


    

    