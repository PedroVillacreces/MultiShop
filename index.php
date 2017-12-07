<?php
require_once "models/links.php";
require_once "models/registration.php";
require_once "models/login.php";
require_once "controllers/template.php";
require_once "controllers/login.php";
require_once "controllers/links.php";
require_once "controllers/registration.php";
require_once "controllers/contactus.php";

$template = new TemplateController();
$template->template();
?>
