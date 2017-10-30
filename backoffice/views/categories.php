<?php
session_start();
if(!$_SESSION["validate"]){
	header("location:login");
	exit();
}
include "views/right-nav.php";
include "views/header.php";
?>
<h2>Categorías</h2>
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">
     <thead>
          <th>Nombre</th>
     </thead>
      <tbody id="categoryRow">
      <?php
        $customer = new Category();
        $customer -> showCategories();
      ?>
      </tbody>
</table>
</div>