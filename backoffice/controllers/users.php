<?php

class Users
{
    public $name;
    public $user_name;
    public $surname;
    public $email;
    public $password;
    public $photo;
    public $rol;
    public $id;

    public function showUsers()
    {
        $response = UsersModel::showUsers("users");

        foreach ($response as $row => $item) {
            echo
                '<tr id="item'.$item['0'].'">
                        <td class="name">'.$item['1'].'</td>
                        <td class="surname">'.$item['2'].'</td> 
                        <td class="user_name">'.$item['3'].'</td>
                         <td class="email">'.$item['4'].'</td> 
                         <td class="rol">'.$item['5'].'</td>
                         <td class="photo">'.$item['6'].'</td> 
                         <td class="password">'.$item['7'].'</td> 
                        <td>
                            <form role="form" method="POST" id="deleteUser">
                                <button type="submit" name="deleteUser" id="deleteUser" class="deleteUserButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="'.$item['0'].'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>
                        <td>     
                            <form role="form" method="POST" id="getById">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="getById" id="getById" class="updateUserButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="'.$item['id'].'">
                                            <input type="hidden" name="updateId" value="'.$item['0'].'">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                            </form>          
                        </td>                        
                    </tr>';
        }
    }

    public function createUser($data)
    {
        $response = UsersModel::createUser($data, "user");
        return $response;
    }

    public static function getUserById($data)
    {
        $response = UsersModel::getUserById($data, "users");
        return $response;
    }

    public function deleteUser($data)
    {
        $response = SubcategoriesModel::deleteSubcategory($data->id_subcategory, "subcategories");
        return $response;
    }

    public function updateUser($data)
    {
        $response = SubcategoriesModel::updateSubcategory($data, "subcategories");
        return $response;
    }
}

if (isset($_POST["createUser"]))
{
    $user = new Users();
    $user->name = $_POST['name'];
    $user->surname = $_POST['surname'];
    $user->email=$_POST['email'];
    $user->password=$_POST['password'];
    $user->photo=$_POST['photo'];
    $user->rol=$_POST['rol'];
    $user->user_name=$_POST['user_name'];
    $user->createUser($user);
}

if (isset($_POST["deleteUser"]))
{
    $subcategory = new Subcategories();
    $subcategory->id_subcategory = $_POST['deleteId'];
    $subcategory->deleteSubcategory($subcategory);
}

if(isset($_POST['updateUser']))
{
    $subcategory = new Subcategories();
    $subcategory->name = $_POST['name'];
    $subcategory->category = $_POST['category_subcategory'];
    $subcategory->id_subcategory = $_POST['id_subcategory'];
    $subcategory->updateSubcategory($subcategory);
}