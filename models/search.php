<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 11/12/17
 * Time: 21:49
 */
class SearchModel
{
    public static function getSearch($name, $table){
        $stmt = Conexion::connect()->prepare("select * from $table WHERE product_name LIKE '%$name%'");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}