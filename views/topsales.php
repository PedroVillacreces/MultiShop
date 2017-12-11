<section class="topSales container">
    <h2>Top Ventas<span style="margin-left:10px;" class="glyphicon glyphicon-upload"></span></h2>
    <div class="row">
        <?php
        $topsales = new TopSales();
        $topsales->getTopSales();
        ?>
    </div>
</section>
<?php
?>