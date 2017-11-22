<?php
require_once "conexion.php";

class SubcategoriesModel
{
    /**
     * Undocumented function
     *
     * @param [type] $table
     * @return void
     */
    public static function showSubcategories($table)
    {
        $stmt = Conexion::connect()->prepare("SELECT t1.id_subcategory, t1.subcategory_name, t2.id_category, t2.category  FROM $table as t1 inner join categories as t2 on t1.id_category = t2.id_category");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static function createSubcategory($data, $table)
    {
        $mysql_conn = Conexion::connect();
        $stmt = $mysql_conn->prepare("INSERT INTO $table (subcategory_name, id_category) VALUES (:subcategory_name, :id_category)");
        $stmt -> bindParam(":subcategory_name", $data->name, PDO::PARAM_STR);
        $stmt -> bindParam(":id_category", $data->category, PDO::PARAM_INT);
        $mysql_conn->beginTransaction();

        if ($stmt->execute()) {
            $id = $mysql_conn->lastInsertId();
            $mysql_conn->commit();
            $message =  "Subcategoría " .$id. " Insertada Correctamente";
            return array("id" => $id, "message" => $message);
        } else {
            return "error";
        }
        $stmt -> close();
    }

    public static function deleteSubcategory($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_subcategory = :id_subcategory");
        $stmt -> bindParam(":id_subcategory", $data, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    public static function getSubById($data, $table)
    {
        $stmt = Conexion::connect()->prepare("select * from $table WHERE id_subcategory = :id_subcategory");
        $stmt ->bindParam(':id_subcategory', $data, PDO::PARAM_INT);
        if($stmt->execute()){
            return $stmt->fetch();
        }
        else{
            return "error";
        }
        $stmt->close();
    }

    public static function updateSubcategory($data, $table)
    {
        $stmt = Conexion::connect()->prepare("UPDATE $table SET subcategory_name = :subcategory_name, id_category = :id_category where id_subcategory = :id_subcategory");
        $stmt -> bindParam(":subcategory_name", $data->name, PDO::PARAM_STR);
        $stmt -> bindParam(":id_category", $data->category, PDO::PARAM_INT);
        $stmt -> bindParam(":id_subcategory", $data->id_subcategory, PDO::PARAM_INT);

        if ($stmt->execute())
        {
            return "ok";

        } else {
            return "error";
        }

        $stmt->close();
    }
}