<?php
session_start();
if(!$_SESSION["validate"]){
	header("location:login");
	exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<div id="inicio" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
 
	<div class="jumbotron">
	    <h1>Bienvenidos</h1>
	    <p>Página de administración de Multishop.</p>
	</div>
		<hr>	
	<ul>

		<li class="botonesInicio">		
			<a href="slide">
			<div style="background:#4CF53A">
			<span class="fa fa-toggle-right"></span>
			<p>Slide</p>
			</div>
			</a>
		</li>

		<li class="botonesInicio">		
			<a href="products">
			<div style="background:#F640DA">
			<span class="fa fa-file-text-o"></span>
			<p>Artículos</p>
			</div>
			</a>
		</li>
		<li class="botonesInicio">		
			<a href="customers">
			<div style="background:#F640DA">
			<span class="fa fa-file-text-o"></span>
			<p>Clientes</p>
			</div>
			</a>
		</li>
		<li class="botonesInicio">
			<a href="subcategories">
				<div style="background:#F640DA">
					<span class="fa fa-file-text-o"></span>
					<p>Subcategorías</p>
				</div>
			</a>
		</li>



	</ul>
</div>


<!--====  Fin de INICIO  ====-->