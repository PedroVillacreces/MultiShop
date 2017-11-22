<?php

/**
 * Undocumented class
 */
class Category
{
    public static function showCategories()
    {
        $response = CategoriesModel::showCategories("categories");
        
                foreach($response as $row => $item){
                    echo 
                    '<tr>
                    <td>'.$item['name'].'</td>
                    </tr>';
                }
    }

    public static function  showCategoriesForSubcategories(){
        $response = CategoriesModel::showCategories("categories");
        return $response;
    }

}