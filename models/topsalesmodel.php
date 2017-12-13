<?php

require_once "conexion.php";
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/12/17
 * Time: 0:56
 */
class TopSalesModel
{
    public static function getTopSales($table){

        $stmt = Conexion::connect()->prepare("select * from $table order by topsales DESC LIMIT 6");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}