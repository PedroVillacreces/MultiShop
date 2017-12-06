<?php

require_once "conexion.php";

class CommentsModel
{
    public static function showComments($table)
    {
        $stmt = Conexion::connect()->prepare("Select t1.id_comment, t1.comment, t1.date, t2.name, 
                                                t2.surname, t1.score, t2.mail, t1.url,
                                                t3.product_name, t4.category, t1.status, t1.title
                                                from $table as t1
                                                inner join customers as t2
                                                on t1.id_customer = t2.id_customer
                                                inner join products as t3
                                                on t1.id_product = t3.id_product
                                                inner join categories as t4
                                                on t1.id_category = t4.id_category");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    public static function deleteComment($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_comment = :id_comment");
        $stmt->bindParam(":id_comment", $data, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    public static function updateComment($data, $table)
    {
        $stmt = Conexion::connect()->prepare("UPDATE $table SET status = :status WHERE id_comment = :id");
        $stmt->bindParam(":status", $data->status, PDO::PARAM_INT);
        $stmt->bindParam(":id", $data->id_comment, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();

    }


    public static function getCommentById($data, $table)
    {
        $stmt = Conexion::connect()->prepare("select * from $table WHERE id_comment = :id_comment");
        $stmt->bindParam(':id_comment', $data->id_comment, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetch();
        } else {
            return "error";
        }
        $stmt->close();
    }

}