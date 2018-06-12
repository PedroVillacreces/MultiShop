<section class="whatsNew container">
    <h2>Novedades<span style="margin-left:10px;" class="glyphicon glyphicon-new-window"></span></h2>
    <div class="row">
        <?php
        $whatsnew = new WhatsNew();
        $whatsnew ->getWhatsNew();
        ?>
    </div>
</section>

<div class="modal fade" id="viewCartModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-view">
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <form method="post" id="viewProductCart" name="viewProductCart">
                                <input type="hidden" class="hidden-id" name="hidden-id">
                                <div class="form-view-cart">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer header-registration">
                <button type="button" class="btn btn-default close-registration" data-dismiss="modal"><b>Cerrar</b></button>
            </div>
        </div>
    </div>
</div>

<?php
if(!isset($_SESSION['validate'])){
    echo '<script>$(".buyit").css("pointer-events", "none");</script>';
}
?>