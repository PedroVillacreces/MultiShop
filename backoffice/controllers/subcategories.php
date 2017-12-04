<?php


class Subcategories
{
    public $name;
    public $id_subcategory;
    public $category;


    public function showSubcategories()
    {
        $response = SubcategoriesModel::showSubcategories("subcategories");

        foreach ($response as $row => $item) {
            echo
                '<tr id="item'.$item['0'].'">
                        <td class="name">'.$item['1'].'</td>
                        <td class="category">'.$item['3'].'</td>                        
                        <td>
                            <form role="form" method="POST" id="deleteSubcategory">
                                <button type="submit" name="deleteSubcategory" id="deleteSubcategory" class="deleteSubcategoryButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="'.$item['0'].'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>
                        <td>     
                            <form role="form" method="POST" id="getById">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="getById" id="getById" class="updateSubcategoryButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="'.$item['id_subcategory'].'">
                                            <input type="hidden" name="updateId" value="'.$item['0'].'">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                            </form>          
                        </td>                        
                    </tr>';
        }
    }

    public function createSubcategory($data)
    {
        $response = SubcategoriesModel::createSubcategory($data, "subcategories");
        return $response;
    }

    public static function getSubcategoryById($data)
    {
        $response = SubcategoriesModel::getSubById($data, "subcategories");
        return $response;
    }

    public function deleteSubcategory($data)
    {
        $response = SubcategoriesModel::deleteSubcategory($data->id_subcategory, "subcategories");
        return $response;
    }

    public function updateSubcategory($data)
    {
        $response = SubcategoriesModel::updateSubcategory($data, "subcategories");
        return $response;
    }

    public static function getSubcategoryByCategoryForProducts($data)
    {
        $response = SubcategoriesModel::showSubcategoriesByIdCategory($data,"subcategories");
        return $response;
    }
}

if (isset($_POST["createSubcategory"]))
{
    $subcategory = new Subcategories();
    $subcategory->name = $_POST['name'];
    $subcategory->category = $_POST['category'];
    $subcategory->createSubcategory($subcategory);

}

if (isset($_POST["deleteSubcategory"]))
{
    $subcategory = new Subcategories();
    $subcategory->id_subcategory = $_POST['deleteId'];
    $subcategory->deleteSubcategory($subcategory);

}

if(isset($_POST['updateSubcategory']))
{
    $subcategory = new Subcategories();
    $subcategory->name = $_POST['name'];
    $subcategory->category = $_POST['category'];
    $subcategory->id_subcategory = $_POST['id_subcategory-update'];
    $subcategory->updateSubcategory($subcategory);
}