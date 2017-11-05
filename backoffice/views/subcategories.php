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
            <h4>Administración de Subcategorías</h4>
            <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal"
                    data-target="#modalSubcategoryCreate" name="create">Nueva Subcategoría
            </button>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                    </thead>
                    <tbody>
                    <?php
                    $subcategory = new Subcategories();
                    $subcategory->showSubcategories();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form role="form" method="POST" id="updateSubcategory">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edición de Subcategoría</h4>
                </div>
                <div id="update-modal-subcategory" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updateSubcategory"
                            class="btn btn-warning btn-lg updateSubcategory" style="width: 100%;"><span
                            class="glyphicon glyphicon-ok-sign"></span> Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- /.modal-create products -->
<form role="form" method="POST" id="createSubcategory">
    <div id="modalSubcategoryCreate" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Crear Nueva Subcategoría</h1>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" id="createSubcategory">
                        <input type="hidden" name="createSubcategory" value="">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <div>
                                <input type="text" class="form-control input-md" id="name" name="name"
                                       value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Categoría</label>
                            <div>
                                <input type="text" class="form-control input-md" id="category"
                                       name="category" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" value="Registrar"
                                        class="btn btn-primary createSubcategoryButton"
                                        name="createSubcategory">Registar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /end .modal-create product -->

