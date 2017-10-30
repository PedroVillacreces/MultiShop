<?php

/**
 * Undocumented class
 */
class Customers
{
    public function showProducts()
    {
        $response = ProductsModel::showProducts("products");
        
        foreach ($response as $row => $item) {
            echo
            '<tr id="item'.$item['id_product'].'">
                        <td class="name">'.$item['name'].'</td>
                        <td class="surname">'.$item['price'].'</td>
                        <td class="mail">'.$item['description'].'</td>
                        <td class="address">'.$item['category'].'</td>
                        <td class="post_code">'.$item['subcategory'].'</td>
                        <td class="region">'.$item['start'].'</td>
                        <td class="phone">'.$item['quantity'].'</td>
                        <td>
                            <form role="form" method="POST" id="deleteProduct">
                                <button type="button" name="deleteProduct" id="deleteProduct" class="deleteProductButton btn btn-danger btn-sm" data-id="'.$item['id_product'].'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>
                        <td>     
                        <form role="form" method="POST" id="updateProduct">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="updateProduct" id="updateProduct" class="updateProductButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="'.$item['id_product'].'">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                            </form>                           
                        </td>                        
                    </tr>';
        }
    }

    public static function deleteProducts($data)
    {
        $response = ProductsModel::deleteProduct($data, "products");
        return $response;
    }

    public static function updateProducts($data)
    {
        $response = ProductsModel::updateProducts($data, 'products');
        return $response;
    }

    public static function getByIdProducts($data)
    {
        $response = ProductsModel::getProductById($data, 'products');
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