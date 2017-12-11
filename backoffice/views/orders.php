<?php
session_start();
if (!$_SESSION["validate_back"]) {
    header("location:login");
    exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<div id="createProfile" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h2>Administrar Pedidos</h2>
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
                    <h1 class="modal-title custom_align" id="Heading">Edición de Pedidos</h1>
                </div>
                <div id="update-modal-orders" class="modal-body">
                    <input type="hidden" id="id_order-update" name="id_order-update" >
                    <div class="form-group">
                        <label class="control-label">Forma de Pago</label>
                        <div>
                            <select class="form-control input-md" id="payment-update"
                                    name="payment" required>
                                <?php
                                $payments = Payments::getPaymentsForOrder();
                                for ($i = 0; $i < count($payments); ++$i) {
                                    echo '<option value="' . $payments[$i]['id_payment'] . '">' . $payments[$i]['type'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Proceso de Entrega</label>
                        <div>
                            <select class="form-control input-md" id="dispath-update"
                                    name="dispath" required>
                                <?php
                                $dispaths = Dispaths::getDispathsForOrder();
                                for ($i = 0; $i < count($dispaths); ++$i) {
                                    echo '<option value="' . $dispaths[$i]['id_dispatch_status'] . '">' . $dispaths[$i]['status'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Procesamiento Interno</label>
                        <div>
                            <select class="form-control input-md" id="status-update"
                                    name="status" required>
                                <?php
                                $status = Statuses::getStatusesForOrder();
                                for ($i = 0; $i < count($status); ++$i) {
                                    echo '<option value="' . $status[$i]['id_delivery_status'] . '">' . $status[$i]['status'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" name="updateOrder"
                                    class="btn btn-warning updateOrder"><span
                                    class="glyphicon glyphicon-ok-sign"></span> Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
