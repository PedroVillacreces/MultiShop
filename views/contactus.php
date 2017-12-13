<?php
if (!isset($_SESSION["validate"])) {
    include "views/login.php";
    include "views/header.php";
}
else{
    include "views/headerlogin.php";
}
?>

<div class="container contact-form" style="margin-bottom: 40px">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-12 col-md-8 col-sm-offset-2 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title custom-title">Formulario de Contacto MultiShop
                        <small class="small-title"> ¡No dudes en contactar con nosotros!</small>
                    </h2>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST">
                        <div class="form-group">
                            <input type="text" required name="name-contact" id="name-contact" class="form-control input-md"
                                   placeholder="Nombre *"/>
                        </div>
                        <div class="form-group">
                            <input type="text" required name="surname-contact" id="surname-contact" class="form-control input-md"
                                   placeholder="Apellidos *"/>
                        </div>
                        <div class="form-group">
                            <input type="email" required name="email-contact" id="email-contact" class="form-control input-md"
                                   placeholder="Email *"/>
                        </div>
                        <div class="form-group">
                            <input type="text" required name="phone-contact" id="phone-contact" class="form-control input-md"
                                   placeholder="Teléfono *"/>
                        </div>
                        <div class="form-group">
                            <textarea name="message-contact" required id="message-contact" class="form-control input-md"
                                   placeholder="Deja tu mensaje *" rows="7"></textarea>
                        </div>
                        <input type="button" name="sendEmailContact" value="Enviar a MultiShop" class="btn btn-info contact-click btn-block btn-lg"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="contactModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-contactus">
                <h3 class="modal-title">Ha contactado con Éxito!</h3>
            </div>
            <div class="modal-body">
                <p><strong>Desde MultiShop agradecemos su confianza por elegir nuestra tienda online para sus compras!</strong></p>
                <p>Gracias por contactar con nosotros, leeremos tu petición y nos pondremos en contacto con usted</p>
                <p>El equipo de MultiShop, contacto:<strong>help@multishop.es</strong></p>
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