<?php

session_start();

if (!isset($_SESSION["validate"])) {
    include "views/login.php";
    include "views/header.php";
    include "views/slider.php";
    include "views/topsales.php";
    include "views/whatsnew.php";
    include "views/footer.php";
}
else{
    include "views/headerlogin.php";
    include "views/slider.php";
    include "views/topsales.php";
    include "views/whatsnew.php";
    include "views/footer.php";
}
?>