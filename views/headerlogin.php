<?php

if (!isset($_SESSION["validate"])) {
include "views/login.php";
}

?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <i class="fa fa-shopping-basket fa-4x" aria-hidden="true"></i>
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img class="img-circle img-responsive img-rounded" style="width: 50px;" src="multimedia/images/logo/index.png" alt="Logo MultiShop"></a>
        </div>
        <ul class="nav navbar-nav main-center">
            <li class="active">
                <a href="home">Inicio</a>
            </li>
            <li>
                <a href="products">Productos</a>
            </li>
            <li>
                <a href="contactus">Contacto</a>
            </li>
            <li>
                <a href="profile">Mi Perfil</a>
            </li>
        </ul>
        <form class="navbar-form navbar-right">
            <div class="form-group dropdown">
                <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown" style="color: white; margin-right: 20px; padding-top: 10px;"> <span class="glyphicon glyphicon glyphicon-user"></span> Hola, <?php echo $_SESSION["name"]; ?>
                    <span class="arrow-way glyphicon glyphicon-chevron-down"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li class="exit-li" role="presentation"><a role="menuitem" tabindex="-1" href="exit"><b>Salir</b></a></li>
                </ul>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
        </form>


    </div>
</nav>