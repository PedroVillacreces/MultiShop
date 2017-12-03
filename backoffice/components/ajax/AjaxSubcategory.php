<?php

require_once "../../models/subcategories.php";
require_once "../../controllers/subcategories.php";
require_once "../../models/categories.php";
require_once "../../controllers/categories.php";

class AjaxSubcategory
{
    public $id_subcategory;
    public $name;
    public $category;
    public $id_category;

    public function getSubcategoryById()
    {
        $data = $this->id_subcategory;
        $response= Subcategories::getSubcategoryById($data);
        $categories = Category::showCategoriesForSubcategories();
        echo json_encode(array('Subcategory' => $response, 'Categories' => $categories));
    }

    public function getSubcategoriesByCategory(){
        $response = Subcategories::getSubcategoryByCategoryForProducts($this->id_category);
        echo json_encode($response);
    }
}

if(isset($_POST["getSubcategoryById"]))
{
    $subcategory = new AjaxSubcategory();
    $subcategory -> id_subcategory = $_POST["getSubcategoryById"];
    $subcategory -> getSubcategoryById();
}

if (isset($_POST['category'])){
    $subcategory = new AjaxSubcategory();
    $subcategory->id_category = $_POST['category'];
    $subcategory->getSubcategoriesByCategory();
}