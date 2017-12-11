<?php

require_once (__DIR__."/../models/categories.php");

class CategoriesFront
{
    public $catsub = array();
    public $id_category;
    public $id_subcategory;
    public function showCategories()
    {
        $response = CategoriesModelFront::showCategoriesSubcategories("categories");

        for($i= 0; $i< count($response); $i++){
            $subcategoriesByIdcategory = CategoriesModelFront::showSubcategories($response[$i]['id_category'] ,"subcategories");

            $unitArray = array(
                "id_category" =>$response[$i]["id_category"],
                "category" => $response[$i]["category"],
                "subcategories" => $subcategoriesByIdcategory
            );

            array_push($this->catsub, $unitArray);
        }

        echo json_encode($this->catsub);
    }

    public function getCategoryById(){
        $response = CategoriesModelFront::showSubcategories($this->id_category, "products");
        echo json_encode($response);
    }

    public function showProductsByIdCate(){
        $response = CategoriesModelFront::showProductsbyCategory($this->id_category, "products");
        $products = array();

        foreach ($response as $row => $item) {
            array_push($products, $item);
        }

        $returnProduct = array(
            "category" => $response['0']['category'],
            "products" => $products
        );

        echo json_encode($returnProduct);
    }

    public function showProductsByIdSubc(){
        $response = CategoriesModelFront::showProductsbySubCategory($this->id_subcategory, "products");
        $products = array();

        foreach ($response as $row => $item) {
            array_push($products, $item);
        }

        $returnProduct = array(
            "subcategories" => $response['0']['subcategory_name'],
            "products" => $products
        );

        echo json_encode($returnProduct);
    }
}



if (isset($_POST['header'])){
    $categories = new CategoriesFront();
    $categories->showCategories();
}

if (isset($_POST['idsCatSub'])){
    $product = new CategoriesFront();
    if(isset($_POST['idsCatSub']['idCategory'])){
        $product->id_category = $_POST['idsCatSub']['idCategory'];
        $product -> showProductsByIdCate();
    }
    else{
        $product->id_subcategory = $_POST['idsCatSub']['idSubcategory'];
        $product -> showProductsByIdSubc();
    }

}
