<?php


class Category
{
    public $id_category;
    public $category;

    public static function showCategories()
    {
        $response = CategoriesModel::showCategories("categories");

        foreach ($response as $row => $item) {
            echo
                '<tr id="item' . $item['0'] . '">
                        <td class="name">' . $item['1'] . '</td>
                        <td>
                            <form role="form" method="POST" id="deleteCategory">
                                <button type="submit" name="deleteCategory" id="deleteCategory" class="deleteCategoryButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="' . $item['0'] . '">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form role="form" method="POST" id="getCategoryById">
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="getCategoryById" id="getById" class="updateCategoryButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="' . $item['id_category'] . '">
                                            <input type="hidden" name="updateId" value="' . $item['0'] . '">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                            </form>
                        </td>
                    </tr>';
        }
    }

    public static function showCategoriesForSubcategories()
    {

        $response = CategoriesModel::showCategories("categories");
        return $response;
    }

    public function createCategory()
    {
        $response = CategoriesModel::createCategory($this->category, "categories");
        return $response;
    }

    public static function getCategoryById($data)
    {
        $response = CategoriesModel::getCategoryById($data, "categories");
        return $response;
    }

    public function deleteCategory()
    {
        $response = CategoriesModel::deleteCategory($this->id_category, "categories");
        return $response;
    }

    public function updateCategory($data)
    {
        $response = CategoriesModel::updateCategory($data, "categories");
        return $response;
    }
}


if (isset($_POST["createCategory"])) {
    $category = new Category();
    $category->category = $_POST['name'];
    $category->createCategory();

}

if (isset($_POST["deleteCategory"])) {
    $category = new Category();
    $category->id_category = $_POST['deleteId'];
    $category->deleteCategory();

}

if (isset($_POST['updateCategory'])) {
    $category = new Category();
    $category->id_category = $_POST['id_category-update'];
    $category->category = $_POST['name'];
    $category->updateCategory($category);
}