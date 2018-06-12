<?php

/**
 *
 * @author pvillacrecesci
 *
 */
class RolesModel
{
    public static function showRolesForUsers($table)
    {
        $stmt = Conexion::connect()->prepare("select * from $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}

