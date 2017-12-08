<?php
session_start();
if (!isset($_SESSION["validate"])) {
    include "views/login.php";
    include "views/header.php";
} else {
    include "views/headerlogin.php";
}
?>
<div class="container" style="margin-left:20px; margin-right: 20px;">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Sheena Shrestha</h3>
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
            <div class="modal-header header-registration">
                <h3 class="modal-title text-center"></h3>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-center">
                                <h2 class="summary-title"></h2>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12 col-md-3 col-lg-3 pull-left">
                                    <div class="panel panel-default height">
                                        <div class="panel-heading">Detalles del pedido</div>
                                        <div class="panel-body delivery-details">
<!--                                            <strong>David Peere:</strong><br>
                                            1111 Army Navy Drive<br>
                                            Arlington<br>
                                            VA<br>
                                            <strong>22 203</strong><br>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3 col-lg-3">
                                    <div class="panel panel-default height">
                                        <div class="panel-heading">Información del pago</div>
                                        <div class="panel-body">
                              <!--              <strong>Card Name:</strong> Visa<br>
                                            <strong>Card Number:</strong> ***** 332<br>
                                            <strong>Exp Date:</strong> 09/2020<br>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3 col-lg-3">
                                    <div class="panel panel-default height">
                                        <div class="panel-heading">Preferencias Pedido</div>
                                        <div class="panel-body">
                     <!--                       <strong>Gift:</strong> No<br>
                                            <strong>Express Delivery:</strong> Yes<br>
                                            <strong>Insurance:</strong> No<br>
                                            <strong>Coupon:</strong> No<br>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="text-center"><strong>Order summary</strong></h3>
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
                                            <tbody>
                                            <tr class="items">
                                                <!--<td class="item-name">Samsung Galaxy S5</td>
                                                <td class="text-center item-price">$900</td>
                                                <td class="text-center item-quantity">1</td>
                                                <td class="text-right amount">$900</td>-->
                                            </tr>
                                            <tr class="prices">
                                        <!--        <td class="highrow"></td>
                                                <td class="highrow"></td>
                                                <td class="highrow text-center"><strong>Subtotal</strong></td>
                                                <td class="highrow text-right">$958.00</td>-->
                                            </tr>
                                            <tr class="quantities">
                                                <!--<td class="emptyrow"></td>
                                                <td class="emptyrow"></td>
                                                <td class="emptyrow text-center"><strong>Shipping</strong></td>
                                                <td class="emptyrow text-right">$20</td>-->
                                            </tr>
                                            <tr class="total-amount">
                            <!--                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                                <td class="emptyrow"></td>
                                                <td class="emptyrow text-center"><strong>Total</strong></td>
                                                <td class="emptyrow text-right">$978.00</td>-->
                                            </tr>
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





