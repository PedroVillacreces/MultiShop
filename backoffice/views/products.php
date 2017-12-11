<?php
session_start();
if (!$_SESSION["validate_back"]) {
    header("location:login");
    exit();
}
include "views/right-nav.php";
include "views/header.php";
?>
<div id="" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h2>Administrar Productos</h2>
    <hr>
    <div class="table-responsive">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalProductCreate"
                name="create">Nuevo Producto
        </button>
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
            $mio = 0;
            ?>
            </tbody>
        </table>
    </div>
</div>


<form role="form" method="POST" id="updateProduct" enctype="multipart/form-data">
    <div class="modal fade" id="edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h1 class="modal-title">Actualizar Producto</h1>
                </div>
                <div id="update-modal-products" class="modal-body">
                    <input type="hidden" id="id_product-update" name="id_product-update" >
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <div>
                            <input type="text" class="form-control input-md" id="name-update" name="name"
                                    required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Precio</label>
                        <div>
                            <input type="text" class="form-control input-md" id="price-update"
                                   name="price"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descripción</label>
                        <div>
                            <input type="text" class="form-control input-md" id="description-update"
                                   name="description"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Categorías</label>
                        <div>
                            <select class="form-control input-md" id="category-update"
                                    name="category" required>
                                <option disabled selected value>Elige Categoría</option>
                                <?php
                                $categories = Category::showCategoriesForSubcategories();
                                for ($i = 0; $i < count($categories); ++$i) {
                                    echo '<option value="' . $categories[$i]['id_category'] . '">' . $categories[$i]['category'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">SubCategorías</label>
                        <div>
                            <select class="form-control input-md" id="subcategory-update"
                                    name="subcategory" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Foto Producto</label>
                        <div>
                            <input type="file" class="form-control input-md" id="photo-product" name="photo-product" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Cantidad</label>
                        <div>
                            <input type="number" class="form-control input-md" id="quantity-update" name="quantity"
                                    required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label class="control-label"><input type="checkbox" id="downloadable-update"
                                                                name="downloadable"
                                                                value="1"><b>Descargable</b></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label class="control-label"><input id="start-update" type="checkbox" name="start"
                                                                value="1"><b>Iniciar</b></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" value="updateProduct"
                                    class="btn btn btn-warning updateProduct"
                                    name="updateProduct">Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


    <div id="modalProductCreate" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h1 class="modal-title">Crear Nuevo Producto</h1>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" id="createProduct" enctype="multipart/form-data">
                        <input type="hidden" name="createProduct" >
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <div>
                                <input type="text" class="form-control input-md" id="name" name="name"
                                        required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Precio</label>
                            <div>
                                <input type="text" class="form-control input-md" id="price"
                                       name="price"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Descripción</label>
                            <div>
                                <input type="text" class="form-control input-md" id="description"
                                       name="description"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Categorías</label>
                            <div>
                                <select class="form-control input-md" id="category"
                                        name="category" required>
                                    <option disabled selected value>Elige Categoría</option>
                                    <?php
                                    $categories = Category::showCategoriesForSubcategories();
                                    for ($i = 0; $i < count($categories); ++$i) {
                                        echo '<option value="' . $categories[$i]['id_category'] . '">' . $categories[$i]['category'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">SubCategorías</label>
                            <div>
                                <select class="form-control input-md" id="subcategory"
                                        name="subcategory" disabled>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Foto Producto</label>
                            <div>
                                <input type="file" class="form-control input-md" id="photo-product" name="photo-product" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Cantidad</label>
                            <div>
                                <input type="number" class="form-control input-md" id="quantity" name="quantity"
                                        required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label class="control-label"><input type="checkbox" name="downloadable" value="1"><b>Descargable</b></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label class="control-label"><input type="checkbox" name="start"
                                                                    value="1"><b>Iniciar</b></label>
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


