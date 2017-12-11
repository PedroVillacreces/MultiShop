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

    public static function getDeliveryDetailsById($data, $table){
        $stmt = Conexion::connect()->prepare("select p1.id_delivery, p1.quantity, p2.id_product, p2.product_name, p2.price,
                                                p3.delivery_date, p3.amount, 
                                                p4.*,
                                                p5.type,
                                                p6.method, p6.price_method
                                                from $table as p2
                                                inner join delivery_details as p1
                                                on p1.id_product = p2.id_product
                                                inner join deliveries as p3
                                                on p1.id_delivery = p3.id_delivery
                                                inner join customers as p4
                                                on p3.id_customer = p4.id_customer
                                                inner join payments as p5
                                                on p3.id_payment = p5.id_payment
                                                inner join dispatch_method as p6
                                                on p6.id_method = p3.id_method
                                                where p1.id_delivery = :id");
        $stmt->bindParam(":id", $data, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}