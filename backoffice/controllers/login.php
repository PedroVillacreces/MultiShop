<?php

/**
 * Undocumented class
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

        if (isset($_POST["userLogin"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["userLogin"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordLogin"])
            ) {

                $dataController = array("user_name" => $_POST["userLogin"],
                    "password" => $_POST["passwordLogin"]);
                $response = LoginModels::loginModel($dataController, "Users");
                $counter = $response["counter"];
                $currentUser = $_POST["userLogin"];
                $maxCounter = 2;

                if ($counter < $maxCounter) {
                    if ($response["user_name"] == $_POST["userLogin"] && base64_decode($response["password"]) == $_POST["passwordLogin"]) {
                        $counter = 0;
                        $dataController = array("currentUser" => $currentUser, "updateCounter" => $counter);
                        $responseUpdateCounter = LoginModels::counterModel($dataController, "Users");
                        session_start();
                        $_SESSION["validate_back"] = true;
                        $_SESSION["user_name_back"] = $response["user_name"];
                        $_SESSION["photo_back"] = $response["photo"];
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