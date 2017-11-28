<?php

class Users
{
    public $id;
    public $name;
    public $user_name;
    public $surname;
    public $email;
    public $password;
    public $photo;
    public $role;

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
                         <td class="role">'.$item['5'].'</td>
                         <td class="photo">
                         <img class="img-thumbnail" src="./'.$item['6'].'" alt="profile"></td>  
                        <td>
                            <form role="form" method="POST" id="deleteUser">
                                <button type="submit" name="deleteUser" id="deleteUser" class="deleteUserButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="'.$item['0'].'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>
                        <td>     
                            <form role="form" method="POST" id="getIdUser">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="getIdUser" id="getById" class="updateUserButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="'.$item['0'].'">
                                            <input type="hidden" name="getIdUser" value="'.$item['0'].'">
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
        $response = UsersModel::createUser($data, "users");
        return $response;
    }

    public static function getUserById($data)
    {
        $response = UsersModel::getUserById($data, "users");
        return $response;
    }

    public function deleteUser($data)
    {
        $response = UsersModel::deleteUser($data->id, "users");
        return $response;
    }

    public function updateUser($data)
    {
        $response = UsersModel::updateUser($data, "users");
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
    $user->role=$_POST['role'];
    $user->user_name=$_POST['user_name'];
    $user->createUser($user);
}

if (isset($_POST["deleteUser"]))
{
    $user = new Users();
    $user->id = $_POST['deleteId'];
    $user->deleteUser($user);
}

if(isset($_POST['updateUser']))
{
    $user = new Users();
    $user->id = $_POST['id'];
    $user->name = $_POST['name'];
    $user->surname = $_POST['surname'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->photo=$_POST['photo'];
    $user->role = $_POST['role'];
    $user->user_name = $_POST['user_name'];
    $user->updateUser($user);
}
