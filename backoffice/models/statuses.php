<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/12/17
 * Time: 23:03
 */
class StatusesModel
{
    public static function showStatusesForOrder($table)
    {
        $stmt = Conexion::connect()->prepare("select * from $table");
        $stmt -> execute();
        return $stmt ->fetchAll();
        $stmt->close();
    }
}