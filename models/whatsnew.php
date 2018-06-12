<?php

require_once "conexion.php";
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/12/17
 * Time: 1:21
 */
class WhatsNewModel
{
    public static function getWhatsNew($table){

        $stmt = Conexion::connect()->prepare("select * from $table order by id_product DESC");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}