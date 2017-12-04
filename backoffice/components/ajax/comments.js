$(document).on('click', '.updateComment', function () {
    var id_comment = $(this).data('id');
    $.ajax({
        url: "../backoffice/components/ajax/AjaxComment.php",
        method: "POST",
        data: {
            getComment: id_comment
        },
        cache: false
    }).done(function (data) {
        var commentAjax = $.parseJSON(data);
        $('input#id_comment-update').val(commentAjax.Comment['0']);

        if(commentAjax.Comment["8"] == 1){
            $('input#status-update').attr('checked', true);
        }
        else{
            $('input#status-update').attr('checked', false);
        }

    });
});

