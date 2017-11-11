<?php

require_once "conexion.php";

class OrdersModel
{
    public $id_delivery;

    public static function showOrders($table)
    {
        $stmt = Conexion::connect()->prepare("select t1.id_delivery, t1.delivery_date, t1.amount, t1.payment, t1.dispath, t1.status,
                                              t4.name
                                                from $table as t1
                                                inner join customers as t4
                                                on t1.id_customer = t4.id_customer");
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static  function deleteOrder($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_delivery = :id_delivery");
        $stmt -> bindParam(":id_delivery", $data, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    public static function  getOrderById($data, $table)
    {
        $stmt = Conexion::connect()->prepare("SELECT * FROM $table WHERE id_delivery = :id_delivery");
        $stmt->bindParam(":id_delivery", $data, PDO::PARAM_INT);

        if($stmt->execute()){

            $result = $stmt -> fetch();
            return $result;
        }
        else{
            return "error";
        }

        $stmt -> close();
    }

    public static function updateOrder($data, $table)
    {
        $stmt = Conexion::connect()->prepare("UPDATE $table SET delivery_date = :delivery_date, amount = :amount,
                payment = :payment, id_customer = :id_customer, status = :status, dispath = :dispath WHERE id_delivery = :id_delivery");
        $stmt -> bindParam(":delivery_date", $data->delivery_data, PDO::PARAM_STR);
        $stmt -> bindParam(":amount", $data->amount, PDO::PARAM_STR);
        $stmt -> bindParam(":payment", $data->payment, PDO::PARAM_STR);
        $stmt -> bindParam(":id_customer", $data->id_customer, PDO::PARAM_INT);
        $stmt -> bindParam(":status", $data->id_customer, PDO::PARAM_INT);
        $stmt -> bindParam(":dispath", $data->dispath, PDO::PARAM_INT);
        $stmt -> bindParam(":id_delivery", $data->id_delivery, PDO::PARAM_INT);


        if ($stmt->execute())
        {
            return "ok";

        } else {
            return "error";
        }

        $stmt->close();
    }
}

