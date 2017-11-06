<?php

require_once "conexion.php";
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 5/11/17
 * Time: 11:33
 */
class UsersModel
{
    public static function showUsers($table)
    {
        $stmt = Conexion::connect()->prepare("SELECT id, name, surname, user_name, email, rol, photo, password FROM $table");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static function createUser($data, $table)
    {
        $mysql_conn = Conexion::connect();
        $stmt = $mysql_conn->prepare("INSERT INTO $table (subcategory_name, id_category) VALUES (:subcategory_name, :id_category)");
        $stmt -> bindParam(":subcategory_name", $data->name, PDO::PARAM_STR);
        $stmt -> bindParam(":id_category", $data->category, PDO::PARAM_INT);
        $mysql_conn->beginTransaction();

        if ($stmt->execute()) {
            $id = $mysql_conn->lastInsertId();
            $mysql_conn->commit();
            $message =  "Subcategoría " .$id. " Insertada Correctamente";
            return array("id" => $id, "message" => $message);
        } else {
            return "error";
        }
        $stmt -> close();
    }

    public static function  deleteSubcategory($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_subcategory = :id_subcategory");
        $stmt -> bindParam(":id_subcategory", $data, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    public static function getUserById($data, $table)
    {
        $stmt = Conexion::connect()->prepare("select * from $table WHERE id = :id");
        $stmt ->bindParam(':id', $data, PDO::PARAM_INT);
        if($stmt->execute())
        {
            return $stmt->fetch();
        }
        else
        {
            return "error";
        }

        $stmt->close();
    }

    public static function getUserByName($data, $table)
    {
        $stmt = Conexion::connect()->prepare("select * from $table WHERE user_name = :user_name");
        $stmt->bindParam(':user_name', $data, PDO::PARAM_STR);
        if ($stmt->execute())
        {
            return $stmt->fetch();
        }
        else{
            return 'error';
        }
    }

    public static function updateSubcategory($data, $table)
    {
        $stmt = Conexion::connect()->prepare("UPDATE $table SET subcategory_name = :subcategory_name, id_category = :id_category where id_subcategory = :id_subcategory");
        $stmt -> bindParam(":subcategory_name", $data->name, PDO::PARAM_STR);
        $stmt -> bindParam(":id_category", $data->category, PDO::PARAM_INT);
        $stmt -> bindParam(":id_subcategory", $data->id_subcategory, PDO::PARAM_INT);

        if ($stmt->execute())
        {
            return "ok";

        } else {
            return "error";
        }

        $stmt->close();
    }
}