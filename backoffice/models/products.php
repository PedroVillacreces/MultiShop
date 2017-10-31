<?php

require_once "conexion.php";
/**
 * Undocumented class
 */
class ProductsModel
{
    public static function showProducts($table){
        $query = "select t1.id_product, t1.name, t1.price, t1.description, t2.category, t3.name, t1.start, t1.quantity, t1.downloadable from " .$table. " as t1 inner join categories as t2 on t1.id_category = t2.id inner join subcategories as t3 on t1.id_subcategory = t3.id_subcategory";

        $stmt = Conexion::connect()->prepare($query);
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static function deleteProduct($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_product = :id_product");
        $stmt -> bindParam(":id_product", $data, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    public static function getProductById($data, $table)
    {
        $parseInt = intval($data);
        $query = "select t1.id_product, t1.name, t1.price, t1.description, t2.category, t3.name, t1.start, t1.quantity, t1.downloadable from " .$table. " as t1 inner join categories as t2 on t1.id_category = t2.id inner join subcategories as t3 on t1.id_subcategory = t3.id_subcategory where id_product =".$parseInt;
        $stmt = Conexion::connect()->prepare($query);
        $stmt->execute();
        $result = $stmt -> fetch();
        return $result;
        $stmt -> close();

    }

    public static function updateProducts($data, $table)
    {
        $stmt = Conexion::connect()->prepare("UPDATE $table SET name = :name, price = :price, description = :description, id_category = :id_category, id_subcategory = :id_subcategory, start = :start, quantity = :quantity, downloadable = :downloadable WHERE id_product = :id_product");
        $stmt -> bindParam(":name", $data->name, PDO::PARAM_STR);
        $stmt -> bindParam(":price", $data->price, PDO::PARAM_STR);
        $stmt -> bindParam(":description", $data->description, PDO::PARAM_LOB);
        $stmt -> bindParam(":id_category", $data->category, PDO::PARAM_INT);
        $stmt -> bindParam(":id_subcategory", $data->subcategory, PDO::PARAM_INT);
        $stmt -> bindParam(":start", $data->start, PDO::PARAM_INT);
        $stmt -> bindParam(":quantity", $data->quantity, PDO::PARAM_INT);
        $stmt -> bindParam(":downloadable", $data->downloadable, PDO::PARAM_INT);
        $stmt -> bindParam(":id_product", $data->id_product, PDO::PARAM_INT);


        if ($stmt->execute())
        {
            return "ok";

        } else {
            return "error";
        }

        $stmt->close();
    }
}