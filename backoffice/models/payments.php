<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/12/17
 * Time: 23:01
 */
class PaymentsModel
{
    public static function showPaymentsForOrder($table)
    {
        $stmt = Conexion::connect()->prepare("select * from $table");
        $stmt -> execute();
        return $stmt ->fetchAll();
        $stmt->close();
    }
}