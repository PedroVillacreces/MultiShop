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
            echo
            '<tr id="item'.$item['0'].'">
                        <td class="name">'.$item['1'].'</td>
                        <td class="price">'.$item['2'].'</td>
                        <td class="description">'.$item['3'].'</td>
                        <td class="category">'.$item['4'].'</td>
                        <td class="subcategory">'.$item['5'].'</td>
                        <td class="start">'.$item['6'].'</td>
                        <td class="quantity">'.$item['7'].'</td>
                        <td class="downloadable">'.$item['8'].'</td>
                        <td>
                            <form role="form" method="POST" id="deleteProduct">
                                <button type="submit" name="deleteProduct" id="deleteProduct" class="deleteProductButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="'.$item['0'].'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>
                        <td>     
                        <form role="form" method="POST" id="getById">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="getById" id="getById" class="updateProductButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="'.$item['id_product'].'">
                                            <input type="hidden" name="updateId" value="'.$item['0'].'">
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

    public static function createProduct($data)
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
    $product->id_product = $_POST['id_product'];
    $product->name = $_POST['name'];
    $product->price= $_POST['price'];
    $product->description = $_POST['description'];
    $product->category = $_POST['category'];
    $product->subcategory = $_POST['subcategory'];
    $product->start = $_POST['start'];
    $product->downloadable = $_POST['downloadable'];
    $product->quantity = $_POST['quantity'];
    $product->updateProducts($product);

}

