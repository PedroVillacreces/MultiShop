<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/12/17
 * Time: 23:02
 */
class DispathsModel
{
    public static function showDispathsForOrder($table)
    {
        $stmt = Conexion::connect()->prepare("select * from $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}