<?php
require_once "conexion.php";

/*TODO we need to implement edit funcionality, maybe switch to slider branch in repository*/

class SliderModel
{
    public static function showSlider($table)
    {
        $stmt = Conexion::connect()->prepare("Select * from $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    public static function deleteSlider($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_slide = :id_slider");
        $stmt->bindParam(":id_slider", $data, PDO::PARAM_INT);
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
        $stmt->bindParam(":url", $data->url, PDO::PARAM_STR);
        $stmt->bindParam(":text_footer", $data->text_footer, PDO::PARAM_STR);
        $stmt->bindParam(":text_header", $data->text_header, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}