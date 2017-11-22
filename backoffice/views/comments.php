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
                <th>Eliminar</th>
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
