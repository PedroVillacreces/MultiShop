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
            <h4>Administración de Productos</h4>
            <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal"
                    data-target="#modalProductCreate" name="create">Nuevo Producto
            </button>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
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
                            <label class="control-label">Categoría</label>
                            <div>
                                <input type="text" class="form-control input-md" id="category"
                                       name="category" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Subcategoría Postal</label>
                            <div>
                                <input type="text" class="form-control input-md" id="subcategory" name="subcategory"
                                       value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Iniciar</label>
                            <div>
                                <input type="text" class="form-control input-md" id="start"
                                       name="start" value="" required>
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
                            <label class="control-label">Descargable</label>
                            <div>
                                <input type="text" class="form-control input-md" id="downloadable"
                                       name="downloadable" required>
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

