<?php
session_start();
if(!$_SESSION["validate"]){
	header("location:login");
	exit();
}
include "views/right-nav.php";
include "views/header.php";
?>
<div id="" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <hr>
    <div class="table-responsive">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalCategoryCreate" name="create" >Nuevo Producto</button>
        <hr>
        <table id="tableCategories" class="table table-striped display">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
