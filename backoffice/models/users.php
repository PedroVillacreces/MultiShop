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
        $stmt = Conexion::connect()->prepare("SELECT t1.id, t1.name, t1.surname, t1.user_name, t1.email, t2.role, t1.photo, t1.password 
                                            FROM $table as t1 INNER JOIN roles as t2 ON t1.id_role = t2.id_role");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static function createUser($data, $table)
    {
        $mysql_conn = Conexion::connect();
        $stmt = $mysql_conn->prepare("INSERT INTO $table (name, surname, user_name, email, rol, photo, password) VALUES (:name, :surname, :user_name, :email, :rol, :photo, :password)");
        $stmt -> bindParam(":name", $data->name, PDO::PARAM_STR);
        $stmt -> bindParam(":surname", $data->surname, PDO::PARAM_STR);
        $stmt -> bindParam(":user_name", $data->email, PDO::PARAM_STR);
        $stmt -> bindParam(":rol", $data->rol, PDO::PARAM_INT);
        $stmt -> bindParam(":photo", $data->photo, PDO::PARAM_STR);
        $stmt -> bindParam(":email", $data->email, PDO::PARAM_STR);
        $stmt -> bindParam(":password", $data->password, PDO::PARAM_STR);
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

    public static function  deleteUser($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id = :id");
        $stmt -> bindParam(":id", $data, PDO::PARAM_INT);
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

    public static function updateUser($data, $table)
    {
        $stmt = Conexion::connect()->prepare("UPDATE $table SET name = :name, surname = :surname, user_name = :user_name, email = :email, id_role = :role, photo= :photo, password= :password where id = :id");
        $stmt -> bindParam(":name", $data->name, PDO::PARAM_STR);
        $stmt -> bindParam(":surname", $data->surname, PDO::PARAM_STR);
        $stmt -> bindParam(":id", $data->id, PDO::PARAM_INT);
        $stmt -> bindParam(":user_name", $data->user_name, PDO::PARAM_STR);
        $stmt -> bindParam(":role", $data->role, PDO::PARAM_INT);
        $stmt -> bindParam(":photo", $data->photo, PDO::PARAM_STR);
        $stmt -> bindParam(":email", $data->email, PDO::PARAM_STR);
        $stmt -> bindParam(":password", $data->password, PDO::PARAM_STR);

        if ($stmt->execute())
        {
            return "ok";

        } else {
            
            return "error";
        }

        $stmt->close();
    }
}