<?php

require_once "conexion.php";
/**
 * Undocumented class
 */
class ProductsModel
{
    public function showProducts($data, $table){
        $stmt = Conexion::connect()->prepare("SELECT name, price, description, quantity FROM $table ORDER BY position ASC");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }
}