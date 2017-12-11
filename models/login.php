<?php

require_once "conexion.php";
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 6/12/17
 * Time: 17:00
 */
class LoginModels
{
    /**
     * Undocumented function
     *
     * @param [type] $dataModel
     * @param [type] $table
     * @return void
     */
    public static function loginModel($dataModel, $table)
    {

        $stmt = Conexion::connect()->prepare("SELECT id_customer, name, mail, password, counter FROM $table WHERE mail = :mail");
        $stmt->bindParam(":mail", $dataModel["user_name"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    /**
     * Undocumented function
     *
     * @param [type] $dataModel
     * @param [type] $table
     * @return void
     */
    public static function counterModel($dataModel, $table)
    {

        $stmt = Conexion::connect()->prepare("UPDATE $table SET counter = :counter WHERE mail = :mail");
        $stmt->bindParam(":counter", $dataModel["updateCounter"], PDO::PARAM_INT);
        $stmt->bindParam(":mail", $dataModel["currentUser"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";
        }

    }
}