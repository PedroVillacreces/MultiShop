<?php

require_once "../../models/users.php";
require_once "../../controllers/users.php";

class AjaxUsers
{
    public $id;

    public function getUserById()
    {
        $data = $this->id;
        $response= Users::getUserById($data);
        $user = json_encode($response);
        echo $user;
    }
}

if(isset($_POST["UserId"]))
{
    $user= new AjaxUsers();
    $user -> id = $_POST["UserId"];
    $user -> getUserById();
}