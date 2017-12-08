<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-registration">
                <h3 class="modal-title text-center">Login de la Página Multishop</h3>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <form method="post" id="formLogin" name="formLogin" onsubmit="return validateLogin()">
                                <div class="form-login">
                                    <h4>Bienvenido de nuevo. Introduzca su Email y Contraseña</h4>
                                    <input type="text" id="userLogin" name="userLogin" class="form-control input-lg chat-input"
                                           placeholder="Email"/>
                                    <br>
                                    <input type="password" id="passwordLogin" name="passwordLogin" class="form-control input-lg chat-input"
                                           placeholder="Contraseña"/>
                                    <br>
                                        <?php
                                        $login = new Login();
                                        $login->loginController();
                                        ?>
                                     <input class="formLogin btn btn-primary btn-md" name="formLogin" type="submit" value="Acceder">

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



