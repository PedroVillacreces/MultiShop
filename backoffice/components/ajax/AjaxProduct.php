<?php

require_once "../../models/products.php";
require_once "../../controllers/products.php";

class AjaxProduct
{
    public $id_product;
    public $name;
    public $surname;
    public $address;
    public $post_code;
    public $phone;
    public $region;
    public $password;
    public $mail;
    public $validate;
    public $id_category;

    public function getProductById()
    {
        $data = $this->id_product;

        $response= Products::getProductById($data);
        echo json_encode(array('Product' => $response));
    }

}

if(isset($_POST["getById"]))
{
    $product= new AjaxProduct();
    $product -> id_product = $_POST["getById"];
    $product -> getProductById();
}


