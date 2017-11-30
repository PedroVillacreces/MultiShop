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
            '<input class="form-control" name="name" id ="name" type="text" value="' + userAjax.User["1"] +'" required>'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Apellidos</label>'+
            '<input class="form-control" name ="surname" id="surname" type="text" value="' + userAjax.User["2"] +'">'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Nombre Usuario</label>'+
            '<input class="form-control" name="user_name" id="user_name" type="text" value="' + userAjax.User["3"] +'" required>'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Email</label>'+
            '<input class="form-control" name="email" id="email" type="mail" value="'+ userAjax.User["4"] +'" required>'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Rol</label>'+
        	'<select name="role" class="form-control" value="'+ userAjax.User["5"] +'">';
	        for(var i = 0; i < userAjax.Roles.length; i++){
	            html += '<option value="'+ userAjax.Roles[i].id_role+'">' + userAjax.Roles[i].role + '</option>';
	        }
        	html+='</select>'+
        	'</div>'+
        	'<div class="form-group">'+
            '<label class="control-label">Foto</label>'+
            '<div>'+
            '<input type="file" class="form-control input-md" id="photo" name="photo" required>'+
            '</div>'+
            '</div>'+
            '<div class="form-group">'+
            '<label class="control-label">Contraseña</label>'+
            '<input class="form-control" name="password" id="password" type="password" value="'+ window.atob(userAjax.User["7"]) +'" required>'+
            '</div>';
        	
        $('#update-modal-users').append(html);
        $('select option[value="'+userAjax.User["5"]+'"]').attr("selected","selected");
    });
});

$(document).on('click', '.deleteUserButton', function () {
    var agree = confirm("¿Realmente desea eliminarlo? ");
    if (agree) return true ;
    return false;

});