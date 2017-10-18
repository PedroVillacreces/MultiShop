<?php

require_once "conexion.php";

class SliderModel
{

    public function uploadImageSliderModel($data, $table)
    {
        $stmt = Conexion::connect()->prepare("INSERT INTO $table (path) VALUES (:path)");
        $stmt -> bindParam(":path", $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    public function showImageSliderModel($data, $table)
    {

        $stmt = Conexion::connect()->prepare("SELECT path, title, description FROM $table WHERE path = :path");
        $stmt -> bindParam(":path", $data, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
    }

    public function showImageViewModel($table)
    {

        $stmt = Conexion::connect()->prepare("SELECT id, path, title, description FROM $table ORDER BY position ASC");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public function deleteSliderModel($data, $table)
    {

        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id = :id");
        $stmt -> bindParam(":id", $date["id_slide"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    public function updateSliderModel($data, $table)
    {

        $stmt = Conexion::connect()->prepare("UPDATE $table SET title = :title, description = :description WHERE id = :id");
        $stmt -> bindParam(":title", $data["sendTitle"], PDO::PARAM_STR);
        $stmt -> bindParam(":description", $data["description"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $data["SendId"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    public function selectUpdateSliderModel($data, $table)
    {

        $stmt = Conexion::connect()->prepare("SELECT title, description FROM $table WHERE id = :id");
        $stmt -> bindParam(":id", $data["sendId"], PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
    }

    public function updatePositionModel($data, $table)
    {

        $stmt = Conexion::connect()->prepare("UPDATE $table SET position = :position WHERE id = :id");
        $stmt -> bindParam(":position", $datos["positionItem"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $datos["positionSlide"], PDO::PARAM_INT);

        if ($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt -> close();
    }

    public function selectPositionModel($table)
    {

        $stmt = Conexion::connect()->prepare("SELECT id, path, title, description FROM $table ORDER BY position ASC");
        $stmt -> execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}
