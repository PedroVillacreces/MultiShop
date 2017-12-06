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

        $link = new PDO('mysql:dbname=id3768274_multishop;host=localhost', "id3768274_root", "patatita67");
        return $link;

    }

}