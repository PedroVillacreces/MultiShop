<?php
session_start();
if (!$_SESSION["validate"]) {
    header("location:login");
    exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<div id="" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<hr>
	<div class="table-responsive">
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalUserCreate" name="create" onclick="">Nuevo Usuario</button>
    <hr>
        <table id="tableUsers" class="table table-striped display">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Foto</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $users = new Users();
            $users->showUsers();
            ?>
            </tbody>
        </table>
    </div>
</div>


<form role="form" method="POST" id="updateUser" enctype="multipart/form-data">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edición de Usuarios</h4>
                </div>
                <div id="update-modal-users" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updateUser"
                            class="btn btn-warning btn-lg updateUser" style="width: 100%;"><span
                            class="glyphicon glyphicon-ok-sign"></span> Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- /.modal-create products -->
<form role="form" method="POST" id="createUser" enctype="multipart/form-data">
    <div id="modalUserCreate" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Crear Nuevo Usuario</h1>
                </div>
                <div class="modal-body">
                        <input type="hidden" name="createUser" value="">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <div>
                                <input type="text" class="form-control input-md" id="name" name="name"
                                       value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Apellidos</label>
                            <div>
                                <input type="text" class="form-control input-md" id="surname"
                                       name="surname" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nombre de Usuario</label>
                            <div>
                                <input type="text" class="form-control input-md" id="user_name"
                                       name="user_name" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <div>
                                <input type="text" class="form-control input-md" id="email"
                                       name="email" value="" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Roles</label>
                            <div>
                                <select class="form-control input-md" id="roles"
                                       name="role" required>
                                    <?php
                                    $roles = Roles::getRolesForUsers();
                                    for($i = 0; $i < count($roles); ++$i){
                                        echo '<option value="'.$roles[$i]['id_role'].'">'.$roles[$i]['role'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                       <div class="form-group">
                        <label class="control-label">Foto</label>
                        <div>
                            <input type="file" class="form-control input-md" id="photo" name="photo" required>
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="control-label">Contraseña</label>
                            <div>
                                <input type="password" class="form-control input-md" id="password"
                                       name="password" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" value="Registrar"
                                        class="btn btn-primary createUserButton"
                                        name="createUser">Registar
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /end .modal-create product -->
