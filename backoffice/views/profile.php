<?php
if (!$_SESSION["validate_back"]) {
    header("location:login");
    exit();
}
include "views/right-nav.php";
include "views/header.php";
?>
<div id="" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h2>Administrar Usuarios</h2>
    <hr>
    <div class="table-responsive">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalUserCreate">Nuevo Usuario
        </button>
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

<form role="form" method="POST" id="createUser" enctype="multipart/form-data">
    <div class="modal fade" id="modalUserCreate" tabindex="-1" role="dialog" aria-labelledby="create"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h1 class="modal-title">Crear Nuevo Usuario</h1>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="createUser" >
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <div>
                            <input type="text" class="form-control input-md" id="name" name="name"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellidos</label>
                        <div>
                            <input type="text" class="form-control input-md" id="surname"
                                   name="surname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nombre de Usuario</label>
                        <div>
                            <input type="text" class="form-control input-md" id="user_name"
                                   name="user_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div>
                            <input type="text" class="form-control input-md" id="email"
                                   name="email"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Roles</label>
                        <div>
                            <select class="form-control input-md" id="roles"
                                    name="role" required>
                                <?php
                                $roles = Roles::getRolesForUsers();
                                for ($i = 0; $i < count($roles); ++$i) {
                                    echo '<option value="' . $roles[$i]['id_role'] . '">' . $roles[$i]['role'] . '</option>';
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
                                   name="password"  required>
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

<form role="form" method="POST" id="updateUser" enctype="multipart/form-data">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h1 class="modal-title custom_align" id="Heading">Edición de Usuarios</h1>
                </div>
                <div id="update-modal-users" class="modal-body">
                    <input type="hidden" id="id_user-update" name="id_user-update" >
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <div>
                            <input type="text" class="form-control input-md" id="name-update" name="name"
                                    required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Apellidos</label>
                        <div>
                            <input type="text" class="form-control input-md" id="surname-update"
                                   name="surname" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nombre de Usuario</label>
                        <div>
                            <input type="text" class="form-control input-md" id="user_name-update"
                                   name="user_name"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div>
                            <input type="text" class="form-control input-md" id="email-update"
                                   name="email"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Roles</label>
                        <div>
                            <select class="form-control input-md" id="roles-update"
                                    name="role" required>
                                <?php
                                $roles = Roles::getRolesForUsers();
                                for ($i = 0; $i < count($roles); ++$i) {
                                    echo '<option value="' . $roles[$i]['id_role'] . '">' . $roles[$i]['role'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Foto</label>
                        <div>
                            <input type="file" class="form-control input-md" id="photo-update" name="photo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Contraseña</label>
                        <div>
                            <input type="password" class="form-control input-md" id="password-update"
                                   name="password"  required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group"
                    ">
                    <button type="submit" name="updateUser"
                            class="btn btn-warning"><span
                            class="glyphicon glyphicon-ok-sign"></span> Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>



