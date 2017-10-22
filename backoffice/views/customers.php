<?php
session_start();
if(!$_SESSION["validate"])
{
	header("location:login");
	exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<div class="container">
	<div class="row">
		
        <div class="col-md-12">
        <h4>Administración Clientes</h4>
        <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Código Postal</th>
                        <th>Región</th>
                        <th>Teléfono</th>
                        <th>Eliminar</th>
                   </thead>
                    <tbody>
                    <?php
                      $customer = new Customers();
                      $customer -> showCustomers();
                    ?>
                    </tbody>
            </table>

<!--            <div class="clearfix"></div>-->
<!--                <ul class="pagination pull-right">-->
<!--                <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>-->
<!--                <li class="active"><a href="#">1</a></li>-->
<!--                <li><a href="#">2</a></li>-->
<!--                <li><a href="#">3</a></li>-->
<!--                <li><a href="#">4</a></li>-->
<!--                <li><a href="#">5</a></li>-->
<!--                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>-->
<!--                </ul>-->
<!--            </div>-->
        </div>
    </div>
</div>
