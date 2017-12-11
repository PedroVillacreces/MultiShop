<?php

require_once "conexion.php";
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/12/17
 * Time: 0:07
 */
class SliderModelsFront
{
    public static function showSlider($table)
    {
        $stmt = Conexion::connect()->prepare("Select * from $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

}