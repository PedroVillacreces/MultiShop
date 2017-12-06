<?php

require_once "conexion.php";

class OrdersModel
{
    public $id_delivery;

    public static function showOrders($table)
    {
        $stmt = Conexion::connect()->prepare("select t1.id_delivery, t1.delivery_date, t1.amount, t4.name, t4.surname, t2.type, t3.status, t5.status
                                                from $table as t1
                                                inner join customers as t4
                                                on t1.id_customer = t4.id_customer
                                                inner join payments as t2
                                                on t1.id_payment = t2.id_payment
                                                inner join delivery_status as t3
                                                on t1.id_status = t3.id_delivery_status
                                                inner join dispatch_status as t5
                                                on t1.id_dispath = t5.id_dispatch_status");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    public static function deleteOrder($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_delivery = :id_delivery");
        $stmt->bindParam(":id_delivery", $data, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
    }

    public static function getOrderById($data, $table)
    {
        $stmt = Conexion::connect()->prepare("SELECT * FROM $table WHERE id_delivery = :id_delivery");
        $stmt->bindParam(":id_delivery", $data, PDO::PARAM_INT);

        if ($stmt->execute()) {

            $result = $stmt->fetch();
            return $result;
        } else {
            return "error";
        }

        $stmt->close();
    }

    public static function updateOrder($data, $table)
    {
        $stmt = Conexion::connect()->prepare("UPDATE $table SET id_payment = :payment, id_dispath = :dispath, id_status = :status WHERE id_delivery = :id_delivery");
        $stmt->bindParam(":payment", $data->payment, PDO::PARAM_INT);
        $stmt->bindParam(":status", $data->status, PDO::PARAM_INT);
        $stmt->bindParam(":dispath", $data->dispath, PDO::PARAM_INT);
        $stmt->bindParam(":id_delivery", $data->id_delivery, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";

        } else {
            return "error";
        }

        $stmt->close();
    }
}

