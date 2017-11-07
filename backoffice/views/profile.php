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
    <button class="btn btn-default">Registrar un nuevo miembro</button>
    <hr>
    <div class="table-responsive">
        <table id="tablaSuscriptores" class="table table-striped display">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Foto</th>
                <th>Contraseña</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $users = new Users();
            $users->showUsers();
            ?>
            </tbody>
        </table>
    </div>
</div>


<form role="form" method="POST" id="updateUser">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edición de Usuarios</h4>
                </div>
                <div id="update-modal-users" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updateUser"
                            class="btn btn-warning btn-lg updateUser" style="width: 100%;"><span
                            class="glyphicon glyphicon-ok-sign"></span> Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
