<?php
if (!isset($_SESSION["validate"])) {
    include "views/login.php";
    include "views/header.php";
} else {
    include "views/headerlogin.php";
}
?>
<section class="container">
    <h2 class ="CatSubProducts"></h2>
    <div class="row products">
        <?php
        if(isset($_POST['searchProduct'])) {
            include "views/search.php";
        }
        ?>
    </div>
</section>
<?php
include "views/footer.php";
?>
