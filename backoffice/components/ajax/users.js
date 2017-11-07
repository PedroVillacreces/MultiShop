/**
 * Ajax to show a user by Id
 */
$(document).on('click', '.updateUserButton', function () {
    var id_user = $(this).data('id');
    $.ajax({
        url: "../backoffice/components/ajax/AjaxUsers.php",
        method: "POST",
        data: {
            UserId : id_user
        },
        cache: false
    }).done(function (data) {
        var userAjax = $.parseJSON(data);
        var html =
            '<input type="hidden" id="id" name="id" value="' + userAjax.User['0'] + '">'+
            '<div class="form-group">'+
            '<label class="control-label">Nombre</label>'+
            '<input class="form-control" name="name" id ="name" type="text" value="' + userAjax.User["1"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Apellidos</label>'+
            '<input class="form-control" name ="surname" id="surname" type="text" value="' + userAjax.User["2"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Nombre Usuario</label>'+
            '<input class="form-control" name="user_name" id="user_name" type="text" value="' + userAjax.User["3"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Email</label>'+
            '<input class="form-control" name="email" id="email" type="mail" value="'+ userAjax.User["4"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Rol</label>'+
            '<input class="form-control" name="rol" id="rol" type="number" value="'+ userAjax.User["5"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Foto Perfil</label>'+
            '<input class="form-control" name="photo" id="photo" type="text" value="'+ userAjax.User["6"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Contraseña</label>'+
            '<input class="form-control" name="password" id="password" type="password" value="'+ userAjax.User["7"] +'">'+
            '</div>';
        $('#update-modal-products').append(html);
    });
});

$(document).on('click', '.deleteUserButton', function () {
    var agree = confirm("¿Realmente desea eliminarlo? ");
    if (agree) return true ;
    return false;

});