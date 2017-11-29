<?php
require_once "models/links.php";
require_once "models/login.php";
require_once "models/products.php";
require_once "models/customers.php";
require_once "models/subcategories.php";
require_once "models/categories.php";
require_once "models/users.php";
require_once "models/orders.php";
require_once "models/roles.php";
require_once "models/comments.php";
require_once "models/slider.php";
require_once "controllers/template.php";
require_once "controllers/links.php";
require_once "controllers/login.php";
require_once "controllers/customers.php";
require_once "controllers/products.php";
require_once "controllers/subcategories.php";
require_once "controllers/categories.php";
require_once "controllers/users.php";
require_once "controllers/orders.php";
require_once "controllers/comments.php";
require_once "controllers/slider.php";
require_once "controllers/roles.php";

$template = new TemplateController();
$template -> template();