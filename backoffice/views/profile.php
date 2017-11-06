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
                <th>Editars</th>
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
