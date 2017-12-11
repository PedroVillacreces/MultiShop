<nav class="navbar navbar-inverse" style="margin-bottom: 0;">
    <div class="container-fluid">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size: 2em; color: #999;padding-top:10px; "></span><span class="badge" id="comparison-count"><?php if(isset($_SESSION['cart_item'])){echo count($_SESSION['cart_item']);} ?></span>
        <div class="navbar-header">
            <a class="navbar-brand" href="home"><img class="img-circle img-responsive img-rounded" style="width: 50px;" src="multimedia/images/logo/index.png" alt="Logo MultiShop"></a>
        </div>
        <ul class="nav navbar-nav main-center">
            <li class="link-menu active">
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
            <div class="form-group">
                <input type="text" class="form-control" name="product-searched" placeholder="Buscar Producto">
            </div>
            <button type="submit" name="searchProduct" class="btn btn-default search-product">Enviar</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="registration">
                    <span class="glyphicon glyphicon-user"></span> Registro</a>
            </li>
            <li>
                <a data-toggle="modal" href="#loginModal">
                    <span class="glyphicon glyphicon-log-in"></span> Login</a>
            </li>
        </ul>
    </div>
</nav>