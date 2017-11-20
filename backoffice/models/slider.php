<?php
require_once "conexion.php";
/**
 * Created by PhpStorm.
 * User: LosSaurios
 * Date: 12/11/2017
 * Time: 10:16
 */
class SliderModel
{
    public static function showSlider($table)
    {
        $stmt = Conexion::connect()->prepare("Select * from $table");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static function deleteSlider($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_slide = :id_slide");
        $stmt -> bindParam(":id_slide", $data, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    public static function createSlider($data, $table)
    {
        $stmt = Conexion::connect()->prepare("INSERT INTO $table (url, text_footer, text_header) VALUES (:url, :text_footer, :text_header)");
        $stmt -> bindParam(":url", $data->url, PDO::PARAM_STR);
        $stmt -> bindParam(":text_footer", $data->text_footer, PDO::PARAM_STR);
        $stmt -> bindParam(":text_header", $data->text_header, PDO::PARAM_STR);

        if ($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }
}