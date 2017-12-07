<?php

/**
 * Undocumented class
 */
class Conexion
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function connect()
    {
        $link = new PDO('mysql:dbname=multishop;host=localhost', "root", "");
        return $link;
    }

}