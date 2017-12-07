<?php

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
     * @return void
     */
    public function loginController()
    {

        if (isset($_POST["formLogin"])) {

            if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $_POST["userLogin"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordLogin"])
            ) {

                $dataController = array("user_name" => $_POST["userLogin"],
                    "password" => $_POST["passwordLogin"]);
                $response = LoginModels::loginModel($dataController, "customers");
                $counter = $response["counter"];
                $currentUser = $_POST["userLogin"];
                $maxCounter = 2;

                if ($counter < $maxCounter) {
                    if ($response["mail"] == $_POST["userLogin"] && base64_decode($response["password"]) == $_POST["passwordLogin"]) {
                        $counter = 0;
                        $dataController = array("currentUser" => $currentUser, "updateCounter" => $counter);
                        $responseUpdateCounter = LoginModels::counterModel($dataController, "customers");
                        session_start();
                        $_SESSION["validate"] = true;
                        $_SESSION["user_name"] = $response["mail"];
                        $_SESSION["name"] = $response["name"];
                        header("location:home");
                    } else {
                        ++$counter;
                        $dataController = array("currentUser" => $currentUser, "updateCounter" => $counter);
                        $responseUpdateCounter = LoginModels::counterModel($dataController, "Users");
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