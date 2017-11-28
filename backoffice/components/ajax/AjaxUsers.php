<?php

require_once "../../models/users.php";
require_once "../../controllers/users.php";
require_once "../../models/roles.php";
require_once "../../controllers/roles.php";

class AjaxUsers
{
    public $id;

    public function getUserById()
    {
        $data = $this->id;
        $response= Users::getUserById($data);
        $roles = Roles::getRolesForUsers();
        $user = json_encode(array('User' => $response, 'Roles' => $roles));
        echo $user;
    }
}

if(isset($_POST["UserId"]))
{
    $user= new AjaxUsers();
    $user -> id = $_POST["UserId"];
    $user -> getUserById();
}