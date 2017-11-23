<?php

require_once "../../models/categories.php";
require_once "../../controllers/categories.php";

class AjaxCategories
{
    
    public $id_category;
    public $category;
    
    public function getCategoryById()
    {
        $data = $this->id_category;
        $response= Category::getCategoryById($data);
        echo json_encode(array('Category' => $response));
    }
}

if(isset($_POST["getCategoryById"]))
{
    $category = new AjaxCategories();
    $category -> id_category = $_POST["getCategoryById"];
    $category -> getCategoryById();
}

