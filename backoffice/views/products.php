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
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalProductCreate" name="create" >Nuevo Producto</button>
        <hr>
        <table id="tableProducts" class="table table-striped display">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Subcategoría</th>
                <th>Iniciar</th>
                <th>Cantidad</th>
                <th>Descargable</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $products = new Products();
            $products->showProducts();
            ?>
            </tbody>
        </table>
    </div>
</div>



<form role="form" method="POST" id="updateProduct">
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edición de Producto</h4>
                </div>
                <div id="update-modal-products" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updateProduct"
                            class="btn btn-warning btn-lg updateProduct" style="width: 100%;"><span
                            class="glyphicon glyphicon-ok-sign"></span> Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- /.modal-create products -->
<form role="form" method="POST" id="createProduct">
    <div id="modalProductCreate" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Crear Nuevo Producto</h1>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" id="createProduct">
                        <input type="hidden" name="createProduct" value="">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <div>
                                <input type="text" class="form-control input-md" id="name" name="name"
                                       value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Precio</label>
                            <div>
                                <input type="text" class="form-control input-md" id="price"
                                       name="price" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Descripción</label>
                            <div>
                                <input type="text" class="form-control input-md" id="description"
                                       name="description" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Categorías</label>
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
                            <label class="control-label">SubCategorías</label>
                            <div>
                                <select class="form-control input-md" id="subcategory"
                                        name="subcategory" required>
                                    <?php
                                    $subcategories = Subcategories::getSubcategoryForProducts();
                                    for($i = 0; $i < count($subcategories); ++$i){
                                        echo '<option value="'.$subcategories[$i]['id_subcategory'].'">'.$subcategories[$i]['subcategory_name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label">Cantidad</label>
                            <div>
                                <input type="number" class="form-control input-md" id="quantity" name="quantity"
                                       value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="checkbox">
                            <label class="control-label"><input type="checkbox" name="downloadable" value="1"><b>Descargable</b></label>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="checkbox">
                            <label class="control-label"><input type="checkbox" name="start" value="1"><b>Iniciar</b></label>
                        </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" value="Registrar"
                                        class="btn btn-primary createProductButton"
                                        name="createProduct">Registar
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

