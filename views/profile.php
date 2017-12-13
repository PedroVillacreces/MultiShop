<?php
if (!isset($_SESSION["validate"])) {
    include "views/login.php";
    include "views/header.php";
} else {
    include "views/headerlogin.php";
}
?>
<div class="container" style="margin: 20px;s">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos del Clientes</h3>
                </div>
                <?php
                $profile = new Profile();
                $profile->getCustomerByEmail($_SESSION['user_name']);
                ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="row">
                <section class="content">
                    <h1 class="text-center" style="font-family: 'Lato', 'sans-serif';">Pedidos en esta Web</h1>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-filter order-filter" data-target="pagado">Pagado</button>
                                        <button type="button" class="btn btn-warning btn-filter order-filter" data-target="pendiente">Pendiente</button>
                                        <button type="button" class="btn btn-danger btn-filter order-filter" data-target="cancelado">Cancelado</button>
                                        <button type="button" class="btn btn-default btn-filter order-filter" data-target="all">Todos</button>
                                    </div>
                                </div>
                                <div class="table-container">
                                    <table class="table table-filter">
                                        <tbody>
                                        <?php
                                        $orders = new Profile();
                                        $orders->getOrdersByCustomer($_SESSION['id'])
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deliveryModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-delivery">
                <h3 class="modal-title text-center delivery-title"></h3>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-center">
                                <h2 class="summary-title"></h2>
                            </div>
                            <hr>
                            <div class="row delivery-details">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="text-center"><strong>Resumen del Pedido</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                            <tr>
                                                <td><strong>Nombre del Producto</strong></td>
                                                <td class="text-center"><strong>Precio del Producto</strong></td>
                                                <td class="text-center"><strong>Cantidad</strong></td>
                                                <td class="text-right"><strong>Total</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody class="insert-items">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer header-registration">
                <button type="button" class="btn btn-default close-registration" data-dismiss="modal"><b>Cerrar</b></button>
            </div>
        </div>
    </div>
</div>
<?php
include "views/footer.php";
?>




