<?php

require_once "conexion.php";
/**
 * Undocumented class
 */
class CategoriesModel
{
    /**
     * Undocumented function
     *
     * @param [type] $table
     * @return void
     */
    public static function showCategories($table)
    {
        $stmt = Conexion::connect()->prepare("SELECT * FROM $table");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

        /**
    * Undocumented function
         *
         * @param [type] $data
         * @param [type] $table
         * @return void
         */
    public static function createCategory($data, $table)
    {
        $stmt = Conexion::connect()->prepare("INSERT INTO $table (category) VALUES (:name)");
        $stmt -> bindParam(":name", $data, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }
    /**
     * Undocumented function
     *
     * @param [type] $data
     * @param [type] $table
     * @return void
     */
    
    public static function deleteCategory($data, $table)
    {
            $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_category = :id");
            $stmt -> bindParam(":id", $data, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
    
            $stmt->close();
     }
/**
 * Undocumented function
 *
 * @param [type] $data
 * @param [type] $table
 * @return void
 */
    public static function updateCategory($data, $table)
    {
            $stmt = Conexion::connect()->prepare("UPDATE $table SET category = :name WHERE id_category = :id");
            $stmt -> bindParam(":name", $data->category, PDO::PARAM_STR);
            $stmt -> bindParam(":id", $data->id_category, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
    
            $stmt->close();
        
    }
    
    public static function getCategoryById($data, $table)
    {
        $stmt = Conexion::connect()->prepare("select * from $table WHERE id_category = :id_category");
        $stmt ->bindParam(':id_category', $data, PDO::PARAM_INT);
        if($stmt->execute()){
            return $stmt->fetch();
        }
        else{
            return "error";
        }
        $stmt->close();
    }
}
    



