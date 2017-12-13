$(document).on('click', '.contact-click', function () {

    var name = $("input#name-contact").val();
    var surname = $("input#surname-contact").val();
    var email = $("input#email-contact").val();
    var message = $("textarea#message-contact").val();
    var phone = $("input#phone-contact").val();

    var htmlBody = '<h2>'+ name + ' ' + surname +' ha contactado con nosotros</h2>'+
                    '<h4><strong>Esta es su pregunta: </strong> </h4>'+
                    '<p>' + message + '</p>'+
                    '<h4><strong>Si desea contacta con él estos son sus datos: </strong></h4>' +
                    '<p><strong>Email: </strong>' + email + '</p>'+
                    '<p><strong>Teléfono: </strong>' + phone + '</p>';


    var jsonFile = {
        'name': name,
        'surname': surname,
        'mail': email,
        'message': htmlBody,
        'phone': phone
    };
    if(name && surname && email && message && phone && htmlBody){
    $.ajax({
        type: "POST",
        url: "controllers/contactus.php",
        data: {
            Contact: jsonFile
        },
        dataType: "json"
    }).done(function (data) {
        if (data.response == 'ok') {
            $('#contactModal').modal('show');
            $('#contactModal').on('hidden.bs.modal', function () {
                document.location = "home";
            });
        }
        else{
            alert("Uppss! Ha habido un error durante el envío:  Por favor intentelo de nuevo más tarde");
            document.location = "contactus";
        }
    });
    }
    else{
        alert('Todos los campos del formulario son obligatorios, rellenelos para continuar');
    }
});