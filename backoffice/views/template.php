<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BackEnd Multishop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="views/images/icono.jpg">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="components/css/font-awesome.min.css">
    <link rel="stylesheet" href="components/css/style.css">
    <link rel="stylesheet" href="components/css/fonts.css">
    <link rel="stylesheet" href="components/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="components/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="components/css/jquery-ui.min.css">
    <link rel="stylesheet" href="components/css/sweetalert.css">
    <link rel="stylesheet" href="components/css/cssFancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="components/css/jquery-ui.min.css">
</head>

<body>

<div class="container-fluid">
    <section class="row">
        <?php
        $links = new Links();
        $links->linksController();
        ?>

    </section>
</div>
<script type="text/javascript" src="components/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="components/js/bootstrap.min.js"></script>
<script type="text/javascript" src="components/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="components/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="components/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="components/js/dataTables.responsive.min.js"></script>
S
<script type="text/javascript" src="components/js/responsive.bootstrap.min.js"></script>
<script type="text/javascript" src="components/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="components/js/sweetalert.min.js"></script>
<script type="text/javascript" src="components/js/script.js"></script>
<script type="text/javascript" src="components/js/moment.min.js"></script>
<script type="text/javascript" src="components/js/moment.locale.js"></script>
<script type="text/javascript" src="components/ajax/customer.js"></script>
<script type="text/javascript" src="components/ajax/product.js"></script>
<script type="text/javascript" src="components/ajax/subcategory.js"></script>
<script type="text/javascript" src="components/ajax/users.js"></script>
<script type="text/javascript" src="components/ajax/orders.js"></script>
<script type="text/javascript" src="components/ajax/comments.js"></script>
<script type="text/javascript" src="components/ajax/slider.js"></script>
<script type="text/javascript" src="components/ajax/categories.js"></script>


</body>

</html>