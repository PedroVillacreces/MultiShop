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

    public function showProducts()
    {
        $response = ProductsModel::showProducts("products");
        
        foreach ($response as $row => $item) {

            $start = $item['start'] == 0 ? "No iniciado" : "Iniciado";
            $downloadable = $item["downloadable"] == 0 ? "No" : "Si";

            echo
            '<tr id="item'.$item['id_product'].'">
                        <td class="name">'.$item['product_name'].'</td>
                        <td class="price">'.$item['price'].'</td>
                        <td class="description">'.$item['description'].'</td>
                        <td class="category">'.$item['category'].'</td>
                        <td class="subcategory">'.$item['subcategory_name'].'</td>
                        <td class="start">'.$start.'</td>
                        <td class="quantity">'.$item['quantity'].'</td>
                        <td class="downloadable">'.$downloadable.'</td>
                        <td>
                            <form role="form" method="POST" id="deleteProduct">
                                <button type="submit" name="deleteProduct" id="deleteProduct" class="deleteProductButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="'.$item['id_product'].'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                        </td>
                        <td>
                        <form role="form" method="POST" id="getById">
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="getById" id="getById" class="updateProductButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="'.$item['id_product'].'">
                                            <input type="hidden" name="updateId" value="'.$item['id_product'].'">
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
        $response = ProductsModel::doUpdate($data, 'products');
        return $response;
    }

}

if (isset($_POST["deleteProduct"])) {
    $message = '¿Está seguro que desea eliminar el Producto?';
    echo "<script type='text/javascript'>alert($message);</script>";
    $product = new Products();
    $product -> id_product = $_POST["deleteId"];
    $product -> deleteProduct();
}

if (isset($_POST["updateProduct"]))
{
    $product = new Products();
    if(!isset($_POST["start"]))
    {
        $product ->start = 0;

    }else{
        $product->start = $_POST['start'];
    }

    if(!isset($_POST["downloadable"]))
    {
        $product ->downloadable = 0;

    }else{
        $product->downloadable = $_POST['downloadable'];
    }
    $product->id_product = $_POST['id_product-update'];
    $product->name = $_POST['name'];
    $product->price= $_POST['price'];
    $product->description = $_POST['description'];
    $product->category = $_POST['category'];
    $product->subcategory = $_POST['subcategory'];
    $product->quantity = $_POST['quantity'];
    $product->updateProducts($product);

}

if (isset($_POST["createProduct"]))
{
    $product = new Products();

    if(!isset($_POST["start"]))
    {
        $product ->start = 0;

    }else{
        $product->start = $_POST['start'];
    }

    if(!isset($_POST["downloadable"]))
    {
        $product ->downloadable = 0;

    }else{
        $product->downloadable = $_POST['downloadable'];
    }
    $product->name = $_POST['name'];
    $product->price= $_POST['price'];
    $product->description = $_POST['description'];
    $product->category = $_POST['category'];
    $product->subcategory = $_POST['subcategory'];
    $product->quantity = $_POST['quantity'];
    $product->createProduct($product);

}

