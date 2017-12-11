<?php
require_once "models/links.php";
require_once "models/registration.php";
require_once "models/login.php";
require_once "models/profile.php";
require_once "models/slider.php";
require_once "models/categories.php";
require_once "models/topsalesmodel.php";
require_once "models/whatsnew.php";
require_once "models/shoppingcart.php";
require_once "models/search.php";
require_once "controllers/template.php";
require_once "controllers/login.php";
require_once "controllers/links.php";
require_once "controllers/registration.php";
require_once "controllers/contactus.php";
require_once "controllers/profile.php";
require_once "controllers/categories.php";
require_once "controllers/slider.php";
require_once "controllers/topsales.php";
require_once "controllers/whatsnew.php";
require_once "controllers/shoppingcart.php";
require_once "controllers/Search.php";

$template = new TemplateController();
$template->template();
?>
