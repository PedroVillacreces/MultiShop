<h2>Busqueda por producto: <span style="margin-left:10px; margin-bottom: 20px;" class="glyphicon glyphicon-search"></span></h2>
<div class="row">
    <div class="col-md-12 col-md-offset-1 col-md-pull-1" style="margin-bottom: 20px;">
    <?php
        $products = new search();
        $products->getSearch();
    ?>
    </div>
</div>