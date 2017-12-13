<?php
if (!isset($_SESSION["validate"])) {
include "views/login.php";
}
?>
<script>
    <?php
    $is_session = false;
        if(isset($_SESSION["validate"])){
        $is_session = true;
            echo 'var session= "' . $is_session .'"';
        }
        ?>
</script>
<nav class="navbar navbar-inverse" style="margin-bottom: 0;">
    <div class="container-fluid">
        <a href="shoppingcart"><span class="glyphicon glyphicon-shopping-cart" style="font-size: 2em; color: #999999;padding-top:10px; "></span><span class="badge" id="comparison-count"><?php if(isset($_SESSION['cart_item'])){echo count($_SESSION['cart_item']);} ?></span></a>
        <div class="navbar-header">
            <a class="navbar-brand" href="home"><img class="img-circle img-responsive img-rounded" style="width: 50px;" src="multimedia/images/logo/index.png" alt="Logo MultiShop"></a>
        </div>
        <ul class="nav navbar-nav main-center">
            <li class="active link-menu">
                <a href="home">Inicio</a>
            </li>
            <li class="dropdown header-click link-menu">
                <a class="header-click" id="dLabel" role="button" data-toggle="dropdown" data-target="#">
                    Productos <span class="caret"></span>
                </a>
                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                </ul>
            </li>
            <li class="link-menu">
                <a href="contactus">Contacto</a>
            </li>
        </ul>
        <form method="post" action="products" class="navbar-form navbar-right" >
            <div class="form-group dropdown">
                <button class="btn btn-primary profile-button" type="button" data-toggle="collapse" data-target="#menu90" style="color: white; margin-right: 20px; padding-top: 10px;"> <span class="glyphicon glyphicon glyphicon-user"></span> Hola, <?php if(isset($_SESSION["name"])) echo $_SESSION["name"]; ?>&nbsp;
                    <span class="arrow-way glyphicon glyphicon-chevron-down"></span></button>
                <ul id ="menu90" class="dropdown-menu profile-click" role="menu" aria-labelledby="menu90">
                    <li class="exit-li" role="presentation"><a role="menuitem" tabindex="-1" href="profile"><b>Mi Cuentas</b></a></li>
                    <li class="exit-li" role="presentation"><a role="menuitem" tabindex="-1" href="exit"><b>Salir</b></a></li>
                </ul>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="product-searched" placeholder="Buscar Producto">
            </div>
            <button type="submit" name="searchProduct" class="btn btn-default">Enviar</button>
        </form>
    </div>
</nav>