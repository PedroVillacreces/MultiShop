<?php

require_once "conexion.php";
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 7/12/17
 * Time: 18:53
 */
class ProfileModels
{
    public static function getCustomerByEmail($mail, $table)
    {
        $stmt = Conexion::connect()->prepare("SELECT id_customer, name, surname, mail, address, post_code, region, phone, validate FROM $table WHERE mail = :mail");
        $stmt->bindParam(":mail", $mail, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    public static function getOrdersByCustomer($id, $table){
        $stmt = Conexion::connect()->prepare("select t1.id_delivery, t1.delivery_date, t1.amount, t2.type, t3.status, t4.status
                                                from $table as t1
                                                inner join payments as t2
                                                on t1.id_payment = t2.id_payment
                                                inner join delivery_status as t3
                                                on t1.id_status = t3.id_delivery_status
                                                inner join dispatch_status as t4
                                                on t1.id_dispath = t4.id_dispatch_status
                                                where t1.id_customer = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    public static function getCountsStatusesByCustomer($id, $table){
        $stmt = Conexion::connect()->prepare("SELECT sum(case when id_status = 1 then 1 end) as paid, 
                                            sum(case when id_status = 2 then 1 end) as unpaid, 
                                            sum(case when id_status = 3 then 1 end) as cancel 
                                            FROM $table where id_customer = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }
}