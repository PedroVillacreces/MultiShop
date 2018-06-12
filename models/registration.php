<?php

require_once "conexion.php";
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 6/12/17
 * Time: 13:28
 */
class RegistrationModel{


    public static function showCustomers($table)
    {
        $stmt = Conexion::connect()->prepare("SELECT id_customer, name, surname, mail, address, post_code, region, phone, 
        validate FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    /**
     * Undocumented function
     *
     * @param [type] $data
     * @param [type] $table
     * @return void
     */
    public static function deleteCustomer($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_customer = :id_customer");
        $stmt->bindParam(":id_customer", $data, PDO::PARAM_INT);
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
     * @return string
     */
    public static function doUpdate($data, $table)
    {
        $stmt = Conexion::connect()->prepare("UPDATE $table SET name = :name, surname = :surname, mail = :mail, address = :address, post_code = :post_code, region = :region, phone = :phone, password = :password, validate = :validate WHERE id_customer = :id");
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":surname", $data['surname'], PDO::PARAM_STR);
        $stmt->bindParam(":mail", $data['mail'], PDO::PARAM_STR);
        $stmt->bindParam(":address", $data['address'], PDO::PARAM_STR);
        $stmt->bindParam(":post_code", $data['post_code'], PDO::PARAM_STR);
        $stmt->bindParam(":region", $data['region'], PDO::PARAM_STR);
        $stmt->bindParam(":phone", $data['phone'], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data['password'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data["id_customer"], PDO::PARAM_INT);
        $stmt->bindParam(":validate", $data["validate"], PDO::PARAM_INT);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";

        } else {
            return "error";
        }

        $stmt->close();
    }

    public static function getCustomerById($id, $table)
    {
        $parseInt = intval($id);
        $stmt = Conexion::connect()->prepare("SELECT * FROM $table WHERE id_customer = $parseInt");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
        $stmt->close();
    }

    public static function createCustomer($customer, $table)
    {
        if (!self::getCustomerByEmail($customer['mail'], 'customers')) {
            $mysql_conn = Conexion::connect();
            $stmt = $mysql_conn->prepare("INSERT INTO $table (name, surname, mail, address, post_code, region, phone, password, validate) VALUES (:name, :surname, :mail, :address, :post_code, :region, :phone, :password, :validate)");
            $stmt->bindParam(":name", $customer['name'], PDO::PARAM_STR);
            $stmt->bindParam(":surname", $customer['surname'], PDO::PARAM_STR);
            $stmt->bindParam(":mail", $customer['mail'], PDO::PARAM_STR);
            $stmt->bindParam(":address", $customer['address'], PDO::PARAM_STR);
            $stmt->bindParam(":post_code", $customer['post_code'], PDO::PARAM_STR);
            $stmt->bindParam(":region", $customer['region'], PDO::PARAM_STR);
            $stmt->bindParam(":phone", $customer['phone'], PDO::PARAM_STR);
            $stmt->bindParam(":password", $customer['password'], PDO::PARAM_STR);
            $stmt->bindParam(":validate", $customer['validate'], PDO::PARAM_STR);
            $mysql_conn->beginTransaction();


            if ($stmt->execute()) {
                $id = $mysql_conn->lastInsertId();
                $mysql_conn->commit();
                $message = "Cliente " . $id . " Inserta Correctamente";
                return array("id" => $id, "message" => $message, "mail" => "noEmail");
            } else {
                return "error";
            }
        } else {
            $message = 'El correo '. $customer['mail'] .' ya pertenece a otro usuario, intentelo con otro';
            return array("id" =>"noId", "mail" => $customer['mail'], "message" => $message);
        }
    }

    public static function getCustomerByEmail($mail, $table)
    {
        $stmt = Conexion::connect()->prepare("SELECT id_customer, name, surname, mail, address, post_code, region, phone, validate FROM $table WHERE mail = :mail");
        $stmt->bindParam(":mail", $mail, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}
