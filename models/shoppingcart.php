<?php

require_once "conexion.php";
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/12/17
 * Time: 16:40
 */
class ShoppingCartModel
{
    public static function getProductById($id, $table){
        $stmt = Conexion::connect()->prepare("Select * from $table where id_product = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    public static function getPayments($table){
        $stmt = Conexion::connect()->prepare("Select * from $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    public static function submitOrder($data, $table){
        $mysql_conn = Conexion::connect();
        $stmt = $mysql_conn->prepare("INSERT INTO $table (delivery_date, id_customer, amount, id_payment, id_dispath, id_status, id_method) 
                                      VALUES (:delivery_date, :id_customer, :amount, :id_payment, :id_dispath, :id_status, :id_method)");
        $stmt->bindValue(":delivery_date", $data['time'], PDO::PARAM_INT);
        $stmt->bindParam(":id_customer", $data['customer'], PDO::PARAM_INT);
        $stmt->bindParam(":amount", $data['amount'], PDO::PARAM_STR);
        $stmt->bindParam(":id_payment", $data['payment'], PDO::PARAM_INT);
        $stmt->bindParam(":id_dispath", $data['dispatch'], PDO::PARAM_INT);
        $stmt->bindParam(":id_method", $data['method'], PDO::PARAM_INT);
        $stmt->bindParam(":id_status", $data['status'], PDO::PARAM_INT);
        $mysql_conn->beginTransaction();

        if ($stmt->execute()) {
            $id = $mysql_conn->lastInsertId();
            $mysql_conn->commit();
            $message = "Pedido " . $id . " Inserta Correctamente";
            return array("id" => $id, "message" => $message);
        } else {
            return "error";
        }
    }

    public static function submitOrderDetails($data, $table){
        $mysql_conn = Conexion::connect();
        $stmt = $mysql_conn->prepare("INSERT INTO $table (id_product, quantity, id_delivery) 
                                      VALUES (:id_product, :quantity, :id_delivery)");
        $stmt->bindParam(":id_product", $data['id_product'], PDO::PARAM_INT);
        $stmt->bindParam(":quantity", $data['quantity'], PDO::PARAM_INT);
        $stmt->bindParam(":id_delivery", $data['id_delivery'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    public static function updateTopSales($sales, $id, $table){
       $stmt = Conexion::connect()->prepare("UPDATE $table SET topsales = :sales WHERE id_product = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":sales", $sales, PDO::PARAM_INT);


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();


    }
}