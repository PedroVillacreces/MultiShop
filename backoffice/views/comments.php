<?php
if (!$_SESSION["validate_back"]) {
    header("location:login");
    exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<div id="createProfile" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h2>Administrar Comentarios</h2>
    <hr>
    <div class="table-responsive">
        <table id="tableComments" class="table table-striped display">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Titulo</th>
                <th>Comentario</th>
                <th>Valoración</th>
                <th>Email</th>
                <th>Url Producto</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Categoría Producto</th>
                <th>Estado</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $comments = new Comments();
            $comments->showComments();
            ?>
            </tbody>
        </table>
    </div>
</div>

<form role="form" method="POST" id="updateComment">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h1 class="modal-title custom_align" id="Heading">Estado del Comentario</h1>
                </div>
                <div id="update-modal-category" class="modal-body">
                    <input type="hidden" id="id_comment-update" name="id_comment-update" >
                    <div class="form-control">
                        <div class="checkbox">
                            <input type="checkbox" class="input-md" id="status-update" name="status"
                                   value="1"><label class="control-label"><b>Estado</b></label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" name="updateCommentUpdate"
                                class="btn btn-warning updateCommentUpdate" style="width: 100%;"><span
                                class="glyphicon glyphicon-ok-sign"></span> Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>