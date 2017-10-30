<?php

/**
 * Undocumented class
 */
class Category
{
    public function showCategories()
    {
        $response = CategoriesModel::showCategories("categories");
        
                foreach($response as $row => $item){
                    echo 
                    '<tr>
                    <td>'.$item['category'].'</td>
                    <td>
                    <form role="form" method="POST" id="deleteCategory">
                        <button type="submit" name="deleteCategory" id="deleteCategory" class="deleteButtonCategory btn btn-danger btn-sm" data-id="'.$item['id'].'">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </form>                            
                </td>
                <td>     
                <form role="form" method="POST" id="updateCategory">                       
                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                <button type="button" name="updateCategory" id="updateCategory" class="updateButtonCategory btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="'.$item['id'].'">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </p>
                    </form>                           
                </td>                  
                    </tr>';
                }
    }
}