<?php
session_start();
if (!$_SESSION["validate_back"]) {
    header("location:login");
    exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<div id="inicio" class="col-lg-8 col-md-8 col-sm-9 col-xs-12">
    <div class="jumbotron">
        <h1>Bienvenido, <?php echo $_SESSION['user_name_back']?></h1>
        <p>Página de administración de Multishop.</p>
    </div>
    <hr>
    <h1 class="text-center">Opciones de Administración</h1>
    <br>
    <ul class="home-boxes">
        <li class="img-responsive">
            <a href="products">
                <div style="background:black">
                    <p style="color: white;">Artículos</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="customers">
                <div style="background:black">
                    <p style="color: white;">Clientes</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="subcategories">
                <div style="background:black">
                    <p style="color: white;">Subcategorías</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="profile">
                <div style="background:black">
                    <p style="color: white;">Usuarios</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="orders">
                <div style="background:black">
                    <p style="color: white;">Pedidos</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="comments">
                <div style="background:black">
                    <p style="color: white;">Comentarios</p>
                </div>
            </a>
        </li>
        <li class="">
            <a href="slider">
                <div style="background:black">
                    <p style="color: white;">Slider</p>
                </div>
            </a>
        </li>
    </ul>
</div>