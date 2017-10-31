<?php
session_start();
if(!$_SESSION["validate"]){
	header("location:login");
	exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
      <thead>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Descripción</th>
      <th>Categoría</th>
      <th>Subcategoría</th>
      <th>Iniciar</th>
      <th>Cantidad</th>
      <th>Descargable</th>
      <th>Eliminar</th>
      <th>Editar</th>
      </thead>
    <tbody>
     <?php
     $products = new Products();
     $products -> showProducts();
     ?>
    </tbody>
  </table>
</div>
<form role="form" method="POST" id="updateProduct">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edición de Producto</h4>
                </div>
                <div id="update-modal-products" class="modal-body">
                </div>
                <div class="modal-footer ">
                        <button type="submit" name="updateProduct" class="btn btn-warning btn-lg updateProduct" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>