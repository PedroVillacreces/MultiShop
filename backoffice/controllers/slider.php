<?php

/**
 * Created by PhpStorm.
 * User: LosSaurios
 * Date: 12/11/2017
 * Time: 10:16
 */
class Slider
{
    public $id_slider;
    public $url;
    public $text_footer;
    public $text_header;


    public function showSlider(){

        $response = SliderModel::showSlider("slider");

        foreach ($response as $row => $item) {
            echo
                '<tr id="item'.$item['0'].'">                       
                         <td class="url">
                         <img class="img-thumbnail" src="./'.$item['1'].'" alt="image1"></td> 
                         <td class="text_footer">'.$item['2'].'</td>
                         <td class="text_header">'.$item['3'].'</td>                          
                        <td>
                            <form role="form" method="POST" id="deleteSlider">
                                <button type="submit" name="deleteSlider" id="deleteSlider" class="deleteSliderButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="'.$item['0'].'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>
                        <td>
                            <form role="form" method="POST" id="getSliderById">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="getSliderById" id="getSliderById" class="updateSliderButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="'.$item['0'].'">
                                            <input type="hidden" name="updateId" value="'.$item['0'].'">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                            </form>                           
                        </td>      
                    </tr>';
        }
    }

    public function deleteSlider()
    {
        $response = SliderModel::deleteSlider($this->id_slider, "slider");
        return $response;
    }

    public function createSlider($data)
    {
        $response = SliderModel::createSlider($data, 'slider');
        return $response;
    }
}

if (isset($_POST['deleteSlider'])){
    $slider = new Slider();
    $slider ->id_slider = $_POST['deleteId'];
    $slider->deleteSlider();
}

if (isset($_POST["createSlide"]))
{
    $target_dir = "multimedia/images/slide/";
    $target_file = $target_dir . basename($_FILES["url"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        $check = getimagesize($_FILES["url"]["tmp_name"]);
        if($check !== false) {
           $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen";
            $uploadOk = 0;
        }

    if (file_exists($target_file)) {
        echo "El archivo ya existe en la base de datos";
        $uploadOk = 0;
    }

    if ($_FILES["url"]["size"] > 500000) {
        echo "No se puede generar archivo porque tiene un tamaño superior al permitido";
        $uploadOk = 0;
    }

    if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Solo se aceptan los siguientes formatos: JPG, JPEG, PNG & GIF ";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "El archivo no ha sido subido";
    } else {
        if (move_uploaded_file($_FILES["url"]["tmp_name"], $target_file)) {
            echo "El archivo ". basename( $_FILES["url"]["name"]). " ha sido cargado";
        } else {
            echo "Ha ocurrido un error al cargar la imagen";
        }
    }

    $slider = new Slider();
    $slider ->text_footer = $_POST["text_footer"];
    $slider->text_header = $_POST["text_header"];
    $slider->url = $target_file;
    $slider->createSlider($slider);
}