<?php

/** 
 * @author pvillacrecesci
 * 
 */

class PhotoUpdater
{
    public static function uploadPhoto($dir, $file)
    {
        //$target_dir = "multimedia/images/profile/";
        $target_file = $dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        
        $check = getimagesize($dir["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script>', 'alert("El archivo que intenta cargar no es una imagen, inténtalo de nuevo");', '</script>';
            $uploadOk = 0;
        }
        
        if (file_exists($target_file)) {
            echo '<script>', 'alert("La imagen ya existe en el directorio, por favor elija otra");', '</script>';
            $uploadOk = 0;
        }
        
        if ($dir["size"] > 500000) {
            echo '<script>', 'alert("No se puede generar archivo porque tiene un tamaño superior al permitido");', '</script>';
            
            $uploadOk = 0;
        }
        
        if (strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg" && $imageFileType != "gif") {
            echo '<script>', 'alert("Solo se aceptan los siguientes formatos: JPG, JPEG, PNG & GIF");', '</script>';
            
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            echo '<script>', 'alert("El archivo no ha sido subido");', '</script>';
        } else {
            if (move_uploaded_file($dir["tmp_name"], $target_file)) {
                echo '<script>', 'alert("El archivo "' . basename($dir["name"]) . ' " ha sido cargado");', '</script>';
            } else {
                echo '<script>', 'alert("Ha ocurrido un error al cargar la imagen");', '</script>';
            }
        }
        
        return $uploadOk;
    }
}

