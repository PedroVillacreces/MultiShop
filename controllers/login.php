<?php

require_once (__DIR__."/../models/login.php");
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 6/12/17
 * Time: 16:59
 */
class Login
{
    /**
     * Undocumented function
     *
     * @return array
     */
    public static function loginController($data)
    {
        $response = LoginModels::loginModel($data, "customers");
        return $response;
    }
}

if (isset($_POST["formLogin"])) {

    if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $_POST['formLogin']["user_name"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST['formLogin']["passwordLogin"])
    ) {

        $dataController = array("user_name" => $_POST['formLogin']["user_name"],
            "password" => $_POST['formLogin']["passwordLogin"]);
        $response = Login::loginController($dataController);
        $counter = $response["counter"];
        $currentUser = $_POST['formLogin']["user_name"];
        $maxCounter = 2;

        if ($counter < $maxCounter) {
            if ($response["mail"] == $_POST['formLogin']["user_name"] && base64_decode($response["password"]) == $_POST['formLogin']["passwordLogin"]) {
                $counter = 0;
                $dataController = array("currentUser" => $currentUser, "updateCounter" => $counter);
                $responseUpdateCounter = LoginModels::counterModel($dataController, "customers");
                session_start();
                $_SESSION["validate"] = true;
                $_SESSION["user_name"] = $response["mail"];
                $_SESSION["name"] = $response["name"];
                $_SESSION["id"] = $response["id_customer"];
                echo json_encode(array('message' => 'ok'));
            } else {
                ++$counter;
                $dataController = array("currentUser" => $currentUser, "updateCounter" => $counter);
                $responseUpdateCounter = LoginModels::counterModel($dataController, "custoomers");
                echo json_encode(array('message' => 'error'));
            }
        } else {
            $counter = 0;
            $dataController = array("currentUser" => $currentUser, "updateCounter" => $counter);
            $responseUpdateCounter = LoginModels::counterModel($dataController, "customers");
            echo json_encode(array('message' => 'tries'));
        }

    }

}

