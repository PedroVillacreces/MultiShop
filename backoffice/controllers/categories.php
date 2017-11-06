<?php

/**
 * Undocumented class
 */
class Category
{
    public static function showCategories()
    {
        $response = ProductsModel::showCategories("categories");
        
                foreach($response as $row => $item){
                    echo 
                    '<tr>
                    <td>'.$item['name'].'</td>
                    </tr>';
                }
    }
}