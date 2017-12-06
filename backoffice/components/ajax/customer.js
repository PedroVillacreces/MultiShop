/**
 * Ajax to delete a customer by Id
 */
$(document).on("click", '.deleteButton', function () {
    if (confirm('¿Estas seguro que desea eliminar al cliente?')) {
        var id_customer = $(this).data('id');

        $.ajax({
            url: "../backoffice/components/ajax/AjaxCustomer.php",
            method: "POST",
            data: {
                id_customer: id_customer
            },
            cache: false
        }).done(function (data) {
            if (data === "ok") {
                $(this).parent().remove();
                $("#item" + id_customer).remove();
                var deleteCustomer = new FormData();
                deleteCustomer.append("id_customer", id_customer);
            } else {
                alert("No se pudo llevar a cabo el borrado");
            }
        });
    }
});

/**
 * Ajax to show a customer by Id
 */
$(document).on('click', '.updateButton', function () {
    var id_customer = $(this).data('id');
    $.ajax({
        url: "../backoffice/components/ajax/AjaxCustomer.php",
        method: "POST",
        data: {
            updateAjax: id_customer
        },
        cache: false
    }).done(function (data) {
        var customerAjax = $.parseJSON(data);

        $('input#id_customer-update').val(customerAjax.Customer['0']);
        $('input#name-update').val(customerAjax.Customer['1']);
        $('input#surname-update').val(customerAjax.Customer['2']);
        $('input#email-update').val(customerAjax.Customer['3']);
        $('input#address-update').val(customerAjax.Customer['4']);
        $('input#pc-update').val(customerAjax.Customer['5']);
        $('input#region-update').val(customerAjax.Customer['6']);
        $('input#phone-update').val(customerAjax.Customer['7']);
        $('input#password-update').val(customerAjax.Customer['8']);
        $('input#password_confirmation-update').val(customerAjax.Customer['8']);

        if (customerAjax.Customer["9"] == 1) {
            $('input#active-update').attr('checked', true);
        }
        else {
            $('input#active-update').attr('checked', false);
        }

    });
});

/**
 * Ajax to update a customer
 */
$(document).on('click', '.doUpdate', function () {

    var id_customer = $("input#id_customer-update").val();
    var name = $("input#name-update").val();
    var surname = $("input#surname-update").val();
    var email = $("input#email-update").val();
    var address = $("input#address-update").val();
    var pc = $("input#pc-update").val();
    var region = $("input#region-update").val();
    var phone = $("input#phone-update").val();
    var password = btoa($("input#password-update").val());
    var confirm_password = btoa($("input#password_confirmation-update").val());
    var active = $("input#active-update").val();

    if (password == confirm_password) {

        var jsonFile = {
            'id_customer': id_customer,
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

        $.ajax({
            type: "POST",
            url: "../backoffice/components/ajax/AjaxCustomer.php",
            data: {
                CustomerUpdate: jsonFile
            },
            dataType: "json"
        }).done(function (data) {
            if (data.message === "ok") {
                $.each(jsonFile, function (i, item) {
                    $("#customersRow" + id_customer + " td." + i).html(item);
                });
                alert("Cliente actualizado correctamente");
                $('.modalUpdate').modal('hide');
            } else {
                alert("El email introducido ya existe");
            }
        });
    }
    else {
        alert('Las contraseñas elegidas deben ser iguales');
    }
});

/**
 * Ajax to create a Customer
 */
$(document).on('click', '.createButton', function () {

    var name = $("input#name").val();
    var surname = $("input#surname").val();
    var email = $("input#email").val();
    var address = $("input#address").val();
    var pc = $("input#pc").val();
    var region = $("input#region").val();
    var phone = $("input#phone").val();
    var password = $("input#password").val();
    var password_confirmation = $("input#password_confirmation").val();


    if (password === password_confirmation) {
        var active = $("input#validate").val();

        if (!active) {
            active = 0;
        }

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

        $.ajax({
            type: "POST",
            url: "../backoffice/components/ajax/AjaxCustomer.php",
            data: {
                Customer: jsonFile
            },
            dataType: "json"
        }).done(function (data) {
            if (data['id']) {
                var htmlRow = "<tr id='item" + data['id'] + "' >;"
                $.each(jsonFile, function (i, item) {
                    if (i !== "password" && i !== "validate") {
                        htmlRow += "<td class=" + i + ">" + item + "</td>";
                    }
                });
                htmlRow += '<td>' +
                    '<form role="form" method="POST" id="deleteCustomer">' +
                    '<button type="button" name="deleteCustomer" id="deleteCustomer" class="deleteButton btn btn-danger btn-sm" data-id="' + data['id'] + '">' +
                    '<span class="glyphicon glyphicon-trash"></span>' +
                    '</button>' +
                    '</form>' +
                    '</td>' +
                    '<td>' +
                    '<form role="form" method="POST" id="updateCustomer">' +
                    '<p data-placement="top" data-toggle="tooltip" title="Edit">' +
                    '<button type="button" name="updateCustomer" id="updateCustomer" class="updateButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit"  data-id="' + data['id'] + '">' +
                    '<span class="glyphicon glyphicon-pencil"></span>' +
                    '</button>' +
                    '</p>' +
                    '</form>' +
                    '</td>' +
                    '</tr>';

                alert(data["message"]);
                $('#bodyCustomers').append(htmlRow);
                $('#modalCreate').modal('hide');
                $('#modalCreate').on('hidden.bs.modal', function () {
                    $(this).find("input,textarea,select").val('').end();

                });

            } else {
                alert("El email introducido ya existe");
            }
        });
    } else {
        alert("Las contraseñas deben ser iguales revisales");
        $("input#password").html("");
        $("input#password_confirmation").html("");
    }
});


