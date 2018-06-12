<?php
session_start();
ob_start();
require_once (__DIR__."/../models/login.php");

class Login
{

    /**
     * Undocumented function
     *
     * @return void
     */
    public function loginController()
    {

        if (isset($_POST["userLogin"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["userLogin"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordLogin"])
            ) {

                $dataController = array("user_name" => $_POST["userLogin"],
                    "password" => $_POST["passwordLogin"]);
                $response = LoginModels::loginModel($dataController, "users");
                $counter = $response["counter"];
                $currentUser = $_POST["userLogin"];
                $maxCounter = 2;

                if ($counter < $maxCounter) {
                    if ($response["user_name"] == $_POST["userLogin"] && base64_decode($response["password"]) == $_POST["passwordLogin"]) {
                        $counter = 0;
                        $dataController = array("currentUser" => $currentUser, "updateCounter" => $counter);
                        $responseUpdateCounter = LoginModels::counterModel($dataController, "users");

                        $_SESSION["validate_back"] = true;
                        $_SESSION["user_name_back"] = $response["user_name"];
                        $_SESSION["photo_back"] = $response["photo"];
                        header('location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/home');
                    } else {
                        ++$counter;
                        $dataController = array("currentUser" => $currentUser, "updateCounter" => $counter);
                        $responseUpdateCounter = LoginModels::counterModel($dataController, "users");
                        echo '<div class="alert alert-danger">Error al loguearse en la página</div>';
                    }
                } else {
                    $counter = 0;
                    $dataController = array("currentUser" => $currentUser, "updateCounter" => $counter);
                    $responseUpdateCounter = LoginModels::counterModel($dataController, "users");
                    echo '<div class="alert alert-danger">Ha gastando los tres intentos,debe demuestrar que no es un robot</div>';
                }

            }

        }
    }

}