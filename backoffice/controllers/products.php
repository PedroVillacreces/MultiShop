<?php

/**
 * Undocumented class
 */
class Products
{
    public $name;
    public $id_product;
    public $price;
    public $description;
    public $category;
    public $subcategory;
    public $start;
    public $quantity;
    public $downloadable;
    public $photo;

    public function showProducts()
    {
        $response = ProductsModel::showProducts("products");

        foreach ($response as $row => $item) {

            $start = $item['start'] == 0 ? "No iniciado" : "Iniciado";
            $downloadable = $item["downloadable"] == 0 ? "No" : "Si";

            echo
                '<tr id="item' . $item['id_product'] . '">
                        <td class="name">' . $item['product_name'] . '</td>
                        <td class="price">' . $item['price'] . '</td>
                        <td class="description">' . $item['description'] . '</td>
                        <td class="category">' . $item['category'] . '</td>
                        <td class="subcategory">' . $item['subcategory_name'] . '</td>
                        <td class="start">' . $start . '</td>
                        <td class="quantity">' . $item['quantity'] . '</td>
                        <td class="downloadable">' . $downloadable . '</td>
                        <td>
                            <form role="form" method="POST" id="deleteProduct">
                                <button type="submit" name="deleteProduct" id="deleteProduct" class="deleteProductButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="' . $item['id_product'] . '">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                        </td>
                        <td>
                        <form role="form" method="POST" id="getById">
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="getById" id="getById" class="updateProductButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="' . $item['id_product'] . '">
                                            <input type="hidden" name="updateId" value="' . $item['id_product'] . '">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                            </form>
                        </td>
                    </tr>';

        }

    }

    public function deleteProduct()
    {
        $response = ProductsModel::deleteProduct($this->id_product, "products");
        return $response;
    }

    public static function getProductById($data)
    {
        $response = ProductsModel::getProductById($data, 'products');
        return $response;
    }

    public function updateProducts($data)
    {
        $response = ProductsModel::updateProducts($data, 'products');
        return $response;
    }

    public function createProduct($data)
    {
        $response = ProductsModel::createProduct($data, 'products');
        return $response;
    }

    public static function getProductByEmail($data)
    {
        $response = ProductsModel::getProductByEmail($data, 'products');
        return $response;
    }

    public static function doUpdate($data)
    {
        $response = ProductsModel::updateProducts($data, 'products');
        return $response;
    }

    public static function uploadPhoto($dir, $file, $userName)
    {
        //$target_dir = "multimedia/images/profile/";
        if (!is_dir($dir . $userName)) {
            mkdir($dir . $userName, 0777, true);
        } else if (count($dir . $userName) !== 0) {
            $files = glob($dir . $userName . '/*');
            foreach ($files as $filedir) {
                unlink($filedir);
            }
        }
        $target_file = $dir . $userName . "/" . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (file_exists($target_file)) {
            echo '<script>', 'alert("La imagen ya existe en el directorio, por favor elija otra");', '</script>';
            $uploadOk = 0;
        }

        if ($file["size"] > 5000000) {
            echo '<script>', 'alert("No se puede generar archivo porque tiene un tamaño superior al permitido");', '</script>';

            $uploadOk = 0;
        }

        if (strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg" && $imageFileType != "gif") {
            echo '<script>', 'alert("Solo se aceptan los siguientes formatos: JPG, JPEG, PNG & GIF, intente cargar una imagen");', '</script>';

            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo '<script>', 'alert("El archivo no ha sido subido");', '</script>';
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo '<script>', 'alert("El archivo "' . basename($file["name"]) . ' " ha sido cargado");', '</script>';
            } else {
                echo '<script>', 'alert("Ha ocurrido un error al cargar la imagen");', '</script>';
            }
        }

        return array("Status" => $uploadOk, "Path" => $target_file);
    }

}

if (isset($_POST["deleteProduct"])) {
    $message = '¿Está seguro que desea eliminar el Producto?';
    echo "<script type='text/javascript'>alert($message);</script>";
    $product = new Products();
    $product->id_product = $_POST["deleteId"];
    $product->deleteProduct();
}

if (isset($_POST["updateProduct"])) {
    $uploadOk = Products::uploadPhoto("multimedia/images/products/", $_FILES["photo-product"], $_POST['name']);

    if ($uploadOk["Status"] != 0) {
        $product = new Products();
        if (!isset($_POST["start"])) {
            $product->start = 0;

        } else {
            $product->start = $_POST['start'];
        }

        if (!isset($_POST["downloadable"])) {
            $product->downloadable = 0;

        } else {
            $product->downloadable = $_POST['downloadable'];
        }
        $product->photo = $uploadOk["Path"];
        $product->id_product = $_POST['id_product-update'];
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->description = $_POST['description'];
        $product->category = $_POST['category'];
        $product->subcategory = $_POST['subcategory'];
        $product->quantity = $_POST['quantity'];
        $product->updateProducts($product);
    }
    else{
        echo '<script>', 'alert("La imagen no ha sido actualizada, inténtelo de nuevo");', '</script>';
    }

}

if (isset($_POST["createProduct"])) {
    $uploadOk = Products::uploadPhoto("multimedia/images/products/", $_FILES["photo-product"], $_POST['name']);

    if ($uploadOk["Status"] != 0) {
        $product = new Products();

        if (!isset($_POST["start"])) {
            $product->start = 0;

        } else {
            $product->start = $_POST['start'];
        }

        if (!isset($_POST["downloadable"])) {
            $product->downloadable = 0;

        } else {
            $product->downloadable = $_POST['downloadable'];
        }
        $product->photo = $uploadOk["Path"];
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->description = $_POST['description'];
        $product->category = $_POST['category'];
        $product->subcategory = $_POST['subcategory'];
        $product->quantity = $_POST['quantity'];
        $product->createProduct($product);
    }
    else{
        echo '<script>', 'alert("La imagen no ha sido creada, inténtelo de nuevo");', '</script>';
    }

}

