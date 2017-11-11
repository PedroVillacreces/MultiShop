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
        <table id="tableOrders" class="table table-striped display">
            <thead>
            <tr>
                <th>Número Pedido</th>
                <th>Fecha del Pedido</th>
                <th>Total del Pedido</th>
                <th>Pagado</th>
                <th>Enviado</th>
                <th>Estado</th>
                <th>Cliente</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $orders = new Orders();
            $orders->showOrders();
            ?>
            </tbody>
        </table>
    </div>
</div>

<form role="form" method="POST" id="updateOrder">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edición de Pedidos</h4>
                </div>
                <div id="update-modal-orders" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updateOrder"
                            class="btn btn-warning btn-lg updateOrder" style="width: 100%;"><span
                                class="glyphicon glyphicon-ok-sign"></span> Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
