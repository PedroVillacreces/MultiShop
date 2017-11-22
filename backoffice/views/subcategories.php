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
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalSubcategoryCreate" name="create" >Nueva Subcategoría</button>
        <hr>
        <table id="tableSubcategories" class="table table-striped display">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
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
                                <select class="form-control input-md" id="category"
                                       name="category" required>
                                    <?php
                                    $categories = Category::showCategoriesForSubcategories();
                                    for($i = 0; $i < count($categories); ++$i){
                                        echo '<option value="'.$categories[$i]['id_category'].'">'.$categories[$i]['category'].'</option>';
                                    }
                                    ?>
                                </select>
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

