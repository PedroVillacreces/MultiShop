<?php

require_once "conexion.php";
/**
 * Undocumented class
 */
class ProductsModel
{
    /**
     * Undocumented function
     *
     * @param [type] $table
     * @return void
     */
    public static function showCategories($table)
    {
        $stmt = Conexion::connect()->prepare("SELECT category FROM $table ORDER BY position ASC");
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
    public function addCategory($data, $table)
    {
        $stmt = Conexion::connect()->prepare("INSERT INTO $table (name) VALUES (:name)");
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
    public function deleteCategory($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id = :id");
        $stmt -> bindParam(":id", $date["id"], PDO::PARAM_INT);
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
    public function updateCategory($data, $table)
    {
        public function updateSliderModel($data, $table)
        {
    
            $stmt = Conexion::connect()->prepare("UPDATE $table SET name = :name WHERE id = :id");
            $stmt -> bindParam(":name", $data["sendName"], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $data["SendId"], PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
    
            $stmt->close();
        }
    }
}