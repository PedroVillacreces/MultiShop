<?php
session_start();
if (!$_SESSION["validate"]) {
    header("location:login");
    exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<div class="container">
    <div class="row">
        
        <div class="col-md-12">
        <h4>Administración Clientes</h4>        
        <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#modalCreate" name="create" onclick="">Nuevo Cliente</button>
        
        <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Código Postal</th>
                        <th>Región</th>
                        <th>Teléfono</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                   </thead>
                    <tbody id="customersRow">
                    <?php
                      $customer = new Customers();
                      $customer -> showCustomers();
                    ?>
                    </tbody>
            </table>



<div class="modal fade modalUpdate" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <h4 class="modal-title custom_align" id="Heading">Edición de Cliente</h4>
                        </div>
                        <div id="update-modal" class="modal-body">
                        </div>
                        <div class="modal-footer ">
                                <button type="button" class="btn btn-warning btn-lg doUpdate" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                        </div>
                </div>  
        </div>     
</div>

 <!-- /.modal-create customer -->
 <div id="modalCreate" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Crear Nuevo Cliente</h1>
            </div>
            <div class="modal-body">                  
                <form role="form" method="POST" id="createCustomer">
                    <input type="hidden" name="createCustomer" value="">
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <div>
                            <input type="text" class="form-control input-md" id="name" name="name" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellido</label>
                        <div>
                            <input type="text" class="form-control input-md" id="surname" name="surname" value="" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail</label>
                        <div>
                            <input type="email" class="form-control input-md" id="email" name="email" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Dirección</label>
                        <div>
                            <input type="text" class="form-control input-md" id="address" name="address" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Código Postal</label>
                        <div>
                            <input type="text" class="form-control input-md" id="pc" name="pc" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Provincia</label>
                        <div>
                            <input type="text" class="form-control input-md" id="region" name="region" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Teléfono</label>
                        <div>
                            <input type="text" class="form-control input-md" id="phone" name="phone" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-md" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <div>
                            <input type="password" class="form-control input-md" id="password_confirmation"name="password_confirmation"  required>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="checkbox">
                    <label class="control-label">Activo<input type="checkbox" id="active" name="active" value="1" required></label>
                  </div>
                    </div>
                    <div class="form-group">
                        <div>
                        <button type="button" value="Registrar" class="btn btn-primary createButton" name="create">Registar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 <!-- /end .modal-create customer --> 
        </div>
    </div>
</div>
