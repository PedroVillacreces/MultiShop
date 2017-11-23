<?php
session_start();
if(!$_SESSION["validate"]){
	header("location:login");
	exit();
}
include "views/right-nav.php";
include "views/header.php";
?>
<div id="" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <hr>
    <div class="table-responsive">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalCategoryCreate" name="create" >Nueva Categoría</button>
        <hr>
        <table id="tableCategories" class="table table-striped display">
            <thead>
            <tr>
                <th>Categoría</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $category = new Category();
            $category->showCategories();
            ?>
            </tbody>
        </table>
    </div>
</div>

<form role="form" method="POST" id="updateCategory">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edición de Categoría</h4>
                </div>
                <div id="update-modal-category" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updateCategory"
                            class="btn btn-warning btn-lg updateCategory" style="width: 100%;"><span
                            class="glyphicon glyphicon-ok-sign"></span> Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<form role="form" method="POST" id="createCategory">
    <div id="modalCategoryCreate" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Crear Nueva Categoría</h1>
                </div>
                <div class="modal-body">
                        <input type="hidden" name="createCategory" value="">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <div>
                                <input type="text" class="form-control input-md" id="name" name="name"
                                       value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" value="Registrar"
                                        class="btn btn-primary createCategoryButton"
                                        name="createCategory">Registar
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</form>
