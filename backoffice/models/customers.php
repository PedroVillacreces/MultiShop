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
    public function __construct($id, $table)
    {
        $row = $this->getCustomerById($id, $table);
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
                return array("id" => $id, "message" => $message);
            } else {
                return "error";
            }
        } else {
            return null;
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
