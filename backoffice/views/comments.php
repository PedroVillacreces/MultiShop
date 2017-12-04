<?php
session_start();
if (!$_SESSION["validate"]) {
    header("location:login");
    exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<div id="crearPerfil" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                    <h4 class="modal-title custom_align" id="Heading">Estado del Comentario</h4>
                </div>
                <div id="update-modal-category" class="modal-body">
                    <input type="hidden" id ="id_comment-update" name="id_comment-update" value="">
                    <div class="form-group">
                        <label class="control-label">Estado</label>
                        <div>
                            <input type="checkbox" class="form-control input-md" id="status-update" name="status"
                                   value="1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updateCommentUpdate"
                            class="btn btn-warning btn-lg updateCommentUpdate" style="width: 100%;"><span
                            class="glyphicon glyphicon-ok-sign"></span> Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>