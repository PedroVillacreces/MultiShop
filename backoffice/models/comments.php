<?php

require_once "conexion.php";

class CommentsModel
{
    public static function showComments($table)
    {
        $stmt = Conexion::connect()->prepare("Select t1.id_comment, t1.date, t1.name, t1.score, t1.mail, t1.url,
                                                t2.name, t2.surname, t3.product_name, t4.category, t1.status
                                                from $table as t1
                                                inner join customers as t2
                                                on t1.id_customer = t2.id_customer
                                                inner join products as t3
                                                on t1.id_product = t3.id_product
                                                inner join categories as t4
                                                on t1.id_category = t4.id_category");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static  function deleteComment($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_comment = :id_comment");
        $stmt -> bindParam(":id_comment", $data, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }
}