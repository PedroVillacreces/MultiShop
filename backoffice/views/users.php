<?php
session_start();
if (!$_SESSION["validate"]) {
    header("location:login");
    exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<!--=====================================
PERFIL
======================================-->

<div id="editProfile" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

    <h1>
        <span class="btn btn-info fa fa-pencil pull-left" style="font-size:10px; margin-right:10px"></span></h1>

    <div style="position:relative">
        <img src="" class="img-circle pull-right">
        <span class="btn btn-info fa fa-pencil" style="font-size:10px; margin-right:10px; position:absolute; right:-20px; top:-50px"></span>
    </div>

    <hr>

    <h4><span class="btn btn-info fa fa-pencil pull-left" style="font-size:10px; margin-right:10px"></span></h4>


</div>

<div id="crearPerfil" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

    <button class="btn btn-default">Registrar un nuevo miembro</button>

    <hr>

    <div class="table-responsive">

        <table id="tablaSuscriptores" class="table table-striped display">
            <thead>
            <tr>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Email</th>
                <th></th>
            </tr>
           </thead>
            <tbody>

            </tbody>
        </table>

    </div>
</div>

