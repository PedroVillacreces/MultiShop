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
            echo '<tr id="item' . $item['0'] . '">
                        <td class="name">' . $item['1'] . '</td>
                        <td class="surname">' . $item['2'] . '</td> 
                        <td class="user_name">' . $item['3'] . '</td>
                         <td class="email">' . $item['4'] . '</td> 
                         <td class="role">' . $item['5'] . '</td>
                         <td class="photo">
                         <img class="img-thumbnail" src="./' . $item['6'] . '" alt="profile"></td>  
                        <td>
                            <form role="form" method="POST" id="deleteUser">
                                <button type="submit" name="deleteUser" id="deleteUser" class="deleteUserButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="' . $item['0'] . '">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>
                        <td>     
                            <form role="form" method="POST" id="getIdUser">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="getIdUser" id="getById" class="updateUserButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="' . $item['0'] . '">
                                            <input type="hidden" name="getIdUser" value="' . $item['0'] . '">
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
        $userName = UsersModel::getUserByUserName($data->user_name, "users");
        if($userName){
            echo '<script>', 'alert("El nombre de usuario elegido ya existe en la Base de Datos, intentelo con otro");', '</script>';
            return "error";
        }
        else{
            $response = UsersModel::createUser($data, "users");
            return $response;
        }
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

        $user = UsersModel::getUserById($data->id, "users");
        if ($data->user_name == $user["user_name"]){
            $data->password = $data->password == $user['password'] ? $data->password : base64_encode($data->password);
            $response = UsersModel::updateUser($data, "users");
            return $response;
        }
        else{
            $userByName = UsersModel::getUserByUserName($data->user_name, "users");
            if ($userByName){
                echo '<script>', 'alert("El nombre de usuario elegido ya existe en la Base de Datos, inténtelo con otro");', '</script>';
            }
            else{
                $response = UsersModel::updateUser($data, "users");
                return $response;
            }
        }

    }

    public static function uploadPhoto($dir, $file, $userName)
    {
        //$target_dir = "multimedia/images/profile/";
        if(!is_dir($dir . $userName)){
            mkdir($dir.$userName, 0777, true);
        }
        else if(count($dir . $userName) !== 0){
            $files = glob($dir . $userName . '/*');
            foreach ($files as $filedir){
                unlink($filedir);
            }
        }
        $target_file = $dir . $userName . "/" . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (file_exists($target_file)) {
            echo '<script>', 'alert("La imagen ya existe en el directorio, por favor elija otra");', '</script>';
            $uploadOk = 0;
        }

        if ($file["size"] > 500000) {
            echo '<script>', 'alert("No se puede generar archivo porque tiene un tamaño superior al permitido");', '</script>';

            $uploadOk = 0;
        }

        if (strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg" && $imageFileType != "gif") {
            echo '<script>', 'alert("Solo se aceptan los siguientes formatos: JPG, JPEG, PNG & GIF, intente cargar una imagen");', '</script>';

            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo '<script>', 'alert("El archivo no ha sido subido");', '</script>';
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo '<script>', 'alert("El archivo "' . basename($file["name"]) . ' " ha sido cargado");', '</script>';
            } else {
                echo '<script>', 'alert("Ha ocurrido un error al cargar la imagen");', '</script>';
            }
        }

        return array("Status" => $uploadOk, "Path" =>$target_file);
    }
}


if (isset($_POST["createUser"])) {

    $uploadOk = Users::uploadPhoto("multimedia/images/profile/", $_FILES["photo"], $_POST['user_name']);
    if ($uploadOk["Status"] != 0) {
    $user = new Users();
    $user->name = $_POST['name'];
    $user->surname = $_POST['surname'];
    $user->email = $_POST['email'];
    $user->password = base64_encode($_POST['password']);
    $user->photo = $uploadOk["Path"];
    $user->role = $_POST['role'];
    $user->user_name = $_POST['user_name'];
    $user->createUser($user);
    } else {
        echo '<script>', 'alert("El Perfil no ha sido actualizado, inténtelo de nuevo");', '</script>';
    }
}

if (isset($_POST["deleteUser"])) {
    $user = new Users();
    $user->id = $_POST['deleteId'];
    $user->deleteUser($user);
}

if (isset($_POST['updateUser'])) {
    
    $uploadOk = Users::uploadPhoto("multimedia/images/profile/", $_FILES["photo"], $_POST['user_name']);
    
    if ($uploadOk["Status"] != 0) {
        $user = new Users();
        $user->id = $_POST['id_user-update'];
        $user->name = $_POST['name'];
        $user->surname = $_POST['surname'];
        $user->email = $_POST['email'];
        $user->photo = $uploadOk["Path"];
        $user->role = $_POST['role'];
        $user->user_name = $_POST['user_name'];
        $user->password = $_POST['password'];
        $user->updateUser($user);
    } else {
        echo '<script>', 'alert("El Perfil no ha sido actualizado, inténtelo de nuevo");', '</script>';
    }
}
