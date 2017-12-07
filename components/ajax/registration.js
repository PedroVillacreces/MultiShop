$(document).on('click', '.custom-button', function () {

    var name = $("input#first_name").val();
    var surname = $("input#last_name").val();
    var email = $("input#email").val();
    var address = $("input#address").val() + ". " + $("input#address2").val() + ". " + $("input#town").val();
    var pc = $("input#pc").val();
    var region = $("input#region").val();
    var phone = $("input#phone").val();
    var password = $("input#password").val();
    var password_confirmation = $("input#password_confirmation").val();
    var active = 0;

    var jsonFile = {
        'name': name,
        'surname': surname,
        'mail': email,
        'address': address,
        'post_code': pc,
        'region': region,
        'phone': phone,
        'password': password,
        'validate': active
    };

    if (password == password_confirmation) {
        $.ajax({
            type: "POST",
            url: "controllers/registration.php",
            data: {
                Customer: jsonFile
            },
            dataType: "json"
        }).done(function (data) {
            if (data['id'] != "noId") {
                $('#successModal').modal('show');
                $('#successModal').on('hidden.bs.modal', function () {
                    document.location = "home";
                });
            }
            else if(data['mail'] != "noEmail") {
                alert(data['message']);
            }
            else{
                alert("Uppss! Ha habido un error durante el registro: " + data['message']+ ". Por favor intentelo de nuevo");
                document.location = "registration";
            }
        });
    }
    else {
        alert("Las contraseñas no son iguales, por favor verifique nuevamente los campos");
    }
});
