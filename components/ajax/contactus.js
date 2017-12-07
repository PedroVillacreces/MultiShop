$(document).on('click', '.contact-click', function () {

    var name = $("input#name-contact").val();
    var surname = $("input#surname-contact").val();
    var email = $("input#email-contact").val();
    var message = $("textarea#message-contact").val();
    var phone = $("input#phone-contact").val();

    var jsonFile = {
        'name': name,
        'surname': surname,
        'mail': email,
        'message': message,
        'phone': phone
    };

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
});