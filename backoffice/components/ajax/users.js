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
        $('input#id_user-update').val(userAjax.User['0']);
        $('input#name-update').val(userAjax.User['1']);
        $('input#surname-update').val(userAjax.User['2']);
        $('input#user_name-update').val(userAjax.User['3']);
        $('input#email-update').val(userAjax.User['4']);
        $('input#password-update').val(userAjax.User['7']);
        $('select[name="role"]').find('option[value="'+ userAjax.User['5'] +'"]').attr("selected",true);

    });
});

$(document).on('click', '.deleteUserButton', function () {
    var agree = confirm("¿Realmente desea eliminarlo? ");
    if (agree) return true ;
    return false;

});