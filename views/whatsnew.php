<section class="whatsNew container">
    <h2>Novedades<span style="margin-left:10px;" class="glyphicon glyphicon-new-window"></span></h2>
    <div class="row">
        <?php
        $whatsnew = new WhatsNew();
        $whatsnew ->getWhatsNew();
        ?>
    </div>
</section>