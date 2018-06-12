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
        //$link = new PDO('mysql:dbname=db5602589_multishop;host=mysql492int.srv-hostalia.com', "u5602589_root", "Multishop_67");
        return $link;
    }

}