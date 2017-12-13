<?php
include "views/header.php";
include "views/login.php";
?>
<div class="container registration-form" style="margin-bottom: 40px;">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-8 col-sm-offset-2 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title custom-title">Formulario de Registro para MultiShop
                        <small class="small-title"> ¡Registro gratuito!</small>
                    </h2>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" class="form-control input-md"
                                           placeholder="Nombre *"  required>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-md"
                                           placeholder="Apellidos *" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-md"
                                   placeholder="Email *" required>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="address" id="address" class="form-control input-md"
                                           placeholder="Dirección Completa *" required>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="town" id="town" class="form-control input-md"
                                           placeholder="Población *" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="address2" id="address2" class="form-control input-md"
                                   placeholder="Complemento de dirección *" required>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="pc" id="pc" class="form-control input-md"
                                           placeholder="Código Postal *" required>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="region" id="region" class="form-control input-md"
                                           placeholder="Provincia *" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" id="phone" class="form-control input-md"
                                   placeholder="Teléfono *" required>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-md"
                                           placeholder="Contraseña *" required>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="form-control input-md" placeholder="Confirmar Contraseña *" >
                                </div>
                            </div>
                        </div>
                        <input type="button" value="Registrar" class="btn btn-info btn-block custom-button btn-lg">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-registration">
                <h3 class="modal-title">Registro Realizado con Éxito!</h3>
            </div>
            <div class="modal-body">
                <p><strong>Desde MultiShop agradecemos su confianza por elegir nuestra tienda online para sus compras!</strong></p>
                <p>Para finalizar su registro, vamos a validar de manera interna el usuario, espero que entienda este proceso</p>
                <p>Para cualquier problema con el registro no dude en contactar con nuestro soporte técnico mediante el email <strong>help@multishop.es</strong></p>
                <p><strong>Gracias y felices compras</strong></p>
            </div>
            <div class="modal-footer header-registration">
                <button type="button" class="btn btn-default close-registration" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<?php
include "views/footer.php";
?>
