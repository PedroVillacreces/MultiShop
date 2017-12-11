<?php
session_start();
if (!isset($_SESSION["validate"])) {
    include "views/login.php";
    include "views/header.php";
} else {
    include "views/headerlogin.php";
}
?>
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <div class="col-md-5" style="border-color: #444444; border-style: solid; margin-top: 20px; margin-left: 20px;">
        <h4>Elije la opción de envío</h4>
        <div class="funkyradio">
            <?php
            $payments = new ShoppingCart();
            $payments ->getDispacth();
            ?>
        </div>
    </div>
    <div class="col-md-5" style="border-color: #444444; border-style: solid; margin-top: 20px; margin-left: 20px;">
        <h4>Elije la opción de Pago</h4>

        <div class="funkyradio">
            <?php
                $payments = new ShoppingCart();
                $payments ->getPayments();
            ?>
        </div>
    </div>
</div>
</div>

<div class="row" style="margin-top: 50px;">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Resumen del pedido</strong></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <td><strong>Producto</strong></td>
                            <td class="text-center"><strong>Precio por Unidad</strong></td>
                            <td class="text-right"><strong>Cantidad</strong></td>
                            <td class="text-right"><strong>Total</strong></td>
                            <td class="text-right"><strong>Eliminar</strong></td>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                        <?php
                            $total = 0;
                            if (isset($_SESSION['cart_item'])) {
                                foreach ($_SESSION['cart_item'] as $row => $item) {
                                    $total = $total + ($item["price"] * $item["quantity"]);
                                    echo '<tr>                            
                                        <td class="item-name" id="'.$item['id'].'">' . $item["name"] . '</td>
                                        <td class="text-center item-price">' . $item["price"] . '€</td>
                                        <td class="text-right item-quantity" id="'.$item['id'].'">' . $item["quantity"] . '</td>
                                        <td class="text-right">' . $item["price"] * $item["quantity"] . '€</td>
                                        <td class="text-right"><button type="button" class="btn btn-danger idDelete" id="' . $item["id"] . '" data-toggle="modal" data-target="#deleteCartModal"><span class="glyphicon glyphicon-remove"></span></button></td>
                                    </tr>';

                                }

                                echo '<tr>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line text-right"><strong>Subtotal</strong></td>
                            <td class="thick-line text-right subtotal-order">' . $total . '€</td>
                        </tr>';
                                echo '<tr>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line text-right"><strong>Precio Envío</strong></td>
                            <td class="thick-line text-right price-method">0.00€</td>
                        </tr>';
                                echo '<tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-right"><strong>Total</strong></td>
                            <td class="no-line text-right total-order">' . $total . '€</td>
                        </tr>';
                            }
                        ?>
                        </tbody>
                    </table>
                    <button id="confirm-order" type="button" style="pointer-events:none; color: #222222; border-color: #222222" class="btn btn-primary">Confirmar el pedido</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteCartModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Eliminación de Productos</h3>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <form method="post" id="formDeleteProductCart" name="formDeleteProductCart">
                                <input type="hidden" class="hidden-id" name="hidden-id">
                                <div class="form-delete-cart">
                                    <h4>Indique la cantidad de este producto que desea eliminar</h4>
                                    <input type="number" id="quantity-delete" name="quantity-delete" class="form-control input-lg chat-input"
                                           placeholder="Número de Productos"/>
                                    <br>
                                    <input class="formDeleteProductCart btn btn-primary btn-md" name="formDeleteProductCart" type="button" value="Eliminar">
                                </div>
                            </form>
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

<div class="modal fade" id="submitCartModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Pago por Transferencia Bancaria</h3>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <form method="post" id="formDeleteProductCart" name="formDeleteProductCart">
                                <input type="hidden" class="hidden-id" name="hidden-id">
                                <div class="form-delete-cart">
                                    <h4>Estos son los datos del pago por transferencia</h4>
                                    <p><strong>ES15 2654878995124523698745</strong></p>
                                    <p><strong>Concepto: </strong>Nombre Cliente. Número de su pedido</p>
                                    <p>Una vez que complete el pago, por favor, envie el justificante del pago a : <strong>ventas@multishop.es</strong></p>
                                    <input class="submitProductCart btn btn-primary btn-md" name="submitProductCart" type="button" value="Confirmar Pago">
                                </div>
                            </form>
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


<div class="modal fade" id="submitCartCardModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Pago por Tarjeta de Crédito</h3>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                                <div class="panel panel-default credit-card-box">
                                    <div class="panel-heading display-table" >
                                        <div class="row display-tr" >
                                            <h3 class="panel-title display-td" >Detalles del Pago</h3>
                                            <div class="display-td" >
                                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label for="cardNumber">NÚMERO TARJETA</label>
                                                        <div class="input-group">
                                                            <input
                                                                type="tel"
                                                                class="form-control"
                                                                name="cardNumber"
                                                                placeholder="Número de Tarjeta Válido"
                                                                autocomplete="cc-number"
                                                                required autofocus
                                                            />
                                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 col-md-7">
                                                    <div class="form-group">
                                                        <label for="cardExpiry"><span class="hidden-xs">FECHA CADUCIDAD</span></label>
                                                        <input
                                                            type="tel"
                                                            class="form-control"
                                                            name="cardExpiry"
                                                            placeholder="MM / YY"
                                                            autocomplete="cc-exp"
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-md-5 pull-right">
                                                    <div class="form-group">
                                                        <label for="cardCVC">CÓDIGO CV</label>
                                                        <input
                                                            type="tel"
                                                            class="form-control"
                                                            name="cardCVC"
                                                            placeholder="CVC"
                                                            autocomplete="cc-csc"
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label for="couponCode">CUPÓN DE DESCUENTO</label>
                                                        <input type="text" class="form-control" name="couponCode" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button class="subscribe btn btn-success btn-lg btn-block" type="button">Confirmar Pago</button>
                                                </div>
                                            </div>
                                            <div class="row" style="display:none;">
                                                <div class="col-xs-12">
                                                    <p class="payment-errors"></p>
                                                </div>
                                            </div>
                                        </form>
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

if (isset($_SESSION['cart_item'])) {
    echo '<script> document.getElementById("confirm-order").style.pointerEvents = "auto";</script>';
}
?>