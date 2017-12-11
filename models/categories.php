<?php

require_once "conexion.php";
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 8/12/17
 * Time: 23:56
 */
class CategoriesModelFront
{
    public static function showCategoriesSubcategories($table)
    {
        $stmt = Conexion::connect()->prepare("select * from $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    public static function showSubcategories($id, $table){
        $stmt = Conexion::connect()->prepare("select * from $table where id_category = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt ->execute();
        return $stmt -> fetchAll();
        $stmt ->close();
    }

    public static function showProductsbyCategory($id, $table){

        $stmt = Conexion::connect()->prepare("select p.*, p2.category from $table as p
                                              inner join categories as p2
                                              on p2.id_category = p.id_category
                                              where p.id_category = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt ->execute();
        return $stmt -> fetchAll();
        $stmt ->close();
    }

    public static function showProductsbySubCategory($id, $table){

        $stmt = Conexion::connect()->prepare("select p.*, p2.subcategory_name from $table as p
                                              inner join subcategories as p2
                                              on p2.id_subcategory = p.id_subcategory
                                              where p.id_subcategory = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt ->execute();
        return $stmt -> fetchAll();
        $stmt ->close();
    }

}