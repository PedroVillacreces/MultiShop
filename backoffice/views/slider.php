<?php
session_start();
if (!$_SESSION["validate"]) {
    header("location:login");
    exit();
}
include "views/right-nav.php";
include "views/header.php";
?>

<div id="createProfile" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <h2>Administrar Slider</h2>
    <hr>
    <div class="table-responsive">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalCreate" name="create"
                onclick="">Nuevo Slide
        </button>
        <hr>
        <table id="tableSlider" class="table table-striped display">
            <thead>
            <tr>
                <th>Imagen</th>
                <th>Texto pie de foto</th>
                <th>Texto de cabera de foto</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $slider = new Slider();
            $slider->showSlider();
            ?>
            </tbody>
        </table>
    </div>
</div>

<div id="modalCreate" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                        class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h1 class="modal-title">Crear Nuevo Slide</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" id="createSlide" enctype="multipart/form-data">
                    <input type="hidden" name="createSlide" value="">
                    <div class="form-group">
                        <label class="control-label">Url</label>
                        <div>
                            <input type="file" class="form-control input-md" id="url" name="url" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Texto cabecera foto</label>
                        <div>
                            <textarea name="text_header" id="text_header" cols="74" rows="5"
                                      placeholder="Introduce tu texto..." required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Texto pie de foto</label>
                        <div>
                            <textarea name="text_footer" id="text_footer" cols="74" rows="5"
                                      placeholder="Introduce tu texto..." required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" value="Registrar" class="btn btn-primary createSlide"
                                    name="createSlide">Registar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

