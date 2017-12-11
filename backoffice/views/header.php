<div id="header-page" class="col-lg-9 col-md-9 col-sm-10 col-xs-12">
    <div class='col-lg-4 col-md-4 col-sm-5 col-xs-4'>
    </div>
    <div class='time-frame text-center col-lg-4 col-md-4 col-sm-5 col-xs-4'>
        <div id='date-part'></div>
        <div id='time-part'></div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4 text-right">
        <img src="<?php echo $_SESSION["photo_back"]; ?> " class="img-circle" alt="Profile">
        <p id="member">Hola, <?php echo $_SESSION["user_name_back"]; ?> <span
                class="glyphicon glyphicon-chevron-down"></span>
            <br>
        <ol id="admin">
            <li><a href="profile"><span class="glyphicon glyphicon-user"></span>Editas tu perfil</a></li>
            <li><a href=""><span class="glyphicon glyphicon-list-alt"></span>Términos y Condiciones</a></li>
            <li><a href="exit"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>
        </ol>
        </p>
    </div>
</div>
