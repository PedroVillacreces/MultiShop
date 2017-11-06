<?php

class AjaxUsers
{
    public $id;

    public function getUserById()
    {
        $data = $this->id;
        $response= Users::getUserById($data);
        echo json_encode(array('Product' => $response));
    }

}

if(isset($_POST["getById"]))
{
    $user= new AjaxUsers();
    $user -> id = $_POST["getById"];
    $user -> getUserById();
}