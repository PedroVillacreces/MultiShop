<?php

require_once "conexion.php";
/**
 * Undocumented class
 */
class CustomersModel
{
    protected $name;
    protected $surname;
    protected $mail;
    protected $address;
    protected $post_code;
    protected $region;
    protected $phone;
    protected $password;

    /**
     * CustomersModel constructor.
     * @param $name
     * @param $surname
     * @param $mail
     * @param $address
     * @param $post_code
     * @param $region
     * @param $phone
     * @param $password
     */
    public function __construct($table)
    {
        $row = $this->getCustomerById($table);
        $this->name = $row["name"];
        $this->surname = $row["surname"];
        $this->mail = $row["mail"];
        $this->address = $row["address"];
        $this->post_code = $row["post_code"];
        $this->region = $row["region"];
        $this->phone = $row["phone"];
        $this->password = $row["password"];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPostCode()
    {
        return $this->post_code;
    }

    /**
     * @param mixed $post_code
     */
    public function setPostCode($post_code)
    {
        $this->post_code = $post_code;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Undocumented function
     *
     * @param [type] $table
     * @return void
     */
    public static function showCustomers($table)
    {
        $stmt = Conexion::connect()->prepare("SELECT id_customer, name, surname, mail, address, post_code, region, phone, 
        validate FROM $table ORDER BY surname ASC");
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
    public static function addCustomer($data, $table)
    {
        $stmt = Conexion::connect()->prepare("INSERT INTO $table (name, surname, mail, address, post_code, region, 
        phone, password) VALUES (:name, :surname, :mail, :address, :post_code, :region, :phone, :password)");
        $stmt -> bindParam(":name", $data['name'], PDO::PARAM_STR);
        $stmt -> bindParam(":surname", $data['surname'], PDO::PARAM_STR);
        $stmt -> bindParam(":mail", $data['mail'], PDO::PARAM_STR);
        $stmt -> bindParam(":address", $data['address'], PDO::PARAM_STR);
        $stmt -> bindParam(":post_code", $data['post_code'], PDO::PARAM_STR);
        $stmt -> bindParam(":region", $data['region'], PDO::PARAM_STR);
        $stmt -> bindParam(":phone", $data['phone'], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $data['password'], PDO::PARAM_STR);

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
    public static function deleteCustomer($data, $table)
    {
        $stmt = Conexion::connect()->prepare("DELETE FROM $table WHERE id_customer = :id_customer");
        $stmt -> bindParam(":id_customer", $data, PDO::PARAM_INT);
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
    public static function updateCategory($data, $table)
    {
        $stmt = Conexion::connect()->prepare("UPDATE $table SET name = :name, surname = :surname, mail = :surname, 
        address = :address, post_code = :post_code, region = :region, phone = :phone WHERE id_customer = :id_customer");
        $stmt -> bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt -> bindParam(":surname", $data['surname'], PDO::PARAM_STR);
        $stmt -> bindParam(":mail", $data['mail'], PDO::PARAM_STR);
        $stmt -> bindParam(":address", $data['address'], PDO::PARAM_STR);
        $stmt -> bindParam(":post_code", $data['post_code'], PDO::PARAM_STR);
        $stmt -> bindParam(":region", $data['region'], PDO::PARAM_STR);
        $stmt -> bindParam(":phone", $data['phone'], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $data['password'], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $data["id_customer"], PDO::PARAM_INT);
    
        if ($stmt->execute())
        {
            return "ok";
        } 
        else 
        {
            return "error";
        }
    
        $stmt->close();
    }

    public static function getCustomerById($table, $id)
    {
        $stmt = Conexion::connect()->prepare("SELECT id_customer, name, surname, mail, address, post_code, region, phone, 
        validate FROM $table WHERE id_custumer = :id_customer");
        $stmt -> bindParam(":id_customer", $id, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
    }

    public static function createCustomer($customer, $table)
    {
        $stmt = Conexion::connect()->prepare("INSERT INTO $table (name, surname, mail, address, post_code, region, phone, password, validate)
        VALUES (:name, :surname, :mail, :address, :post_code, :region, :phone, :password, :validate)");
        $stmt -> bindParam(":name", $customer['name'], PDO::PARAM_STR);
        $stmt -> bindParam(":surname", $customer['surname'], PDO::PARAM_STR);
        $stmt -> bindParam(":mail", $customer['mail'], PDO::PARAM_STR);
        $stmt -> bindParam(":address", $customer['address'], PDO::PARAM_STR);
        $stmt -> bindParam(":post_code", $customer['post_code'], PDO::PARAM_STR);
        $stmt -> bindParam(":region", $customer['region'], PDO::PARAM_STR);
        $stmt -> bindParam(":phone", $customer['phone'], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $customer['password'], PDO::PARAM_STR);
        $stmt -> bindParam(":validate", $customer['validate'], PDO::PARAM_STR);

        if ($stmt->execute())
        {
            return "Inserta Correctamente";
        } 
        else 
        {
            return "error";
        }
    
        $stmt->close();
    }
}