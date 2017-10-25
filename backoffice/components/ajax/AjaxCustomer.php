<?php
require_once "../../models/customers.php";
require_once "../../controllers/customers.php";

class AjaxCustomer
{
    public $id_customer;

    public $name;
    public $surname;
    public $address;
    public $post_code;
    public $phone;
    public $region;
    public $password;
    public $mail;
    public $validate;

    public function deleteCustomer()
    {
        $data = $this->id_customer;
        $response = Customers::deleteCustomers($data);
        echo $response;
    }

    public function updateCustomer()
    {
        $data = $this->id_customer;
        $response = Customers::getByIdCustomers($data);
        echo $response;
    }

    public function createCustomer()
    {
        $data['name'] = $this->name;
        $data['surname'] = $this->surname;
        $data['address'] = $this->address;
        $data['post_code'] = $this->post_code;
        $data['phone'] = $this->phone;
        $data['region'] = $this->region;
        $data['password'] = $this->password;
        $data['mail'] = $this->mail;
        $data['validate'] = $this->validate;
        $response = Customers::createCustomer($data);
        echo $response;
    }
}

if(isset($_POST["id_customer"])){
    
    $customer= new AjaxCustomer();
    $customer -> id_customer = $_POST["id_customer"];
    $customer -> deleteCustomer();

}

if(isset($_POST["update"])){
    
    $customer= new AjaxCustomer();
    $customer -> id_customer = $_POST["id_customer"];
    $customer -> updateCustomer();

}

if(isset($_POST["Customer"])){
    
    $customer= new AjaxCustomer();
    $customer-> name =  $_POST["Customer"]["name"];
    $customer-> surname = $_POST["Customer"]["surname"];
    $customer-> address = $_POST["Customer"]["address"];
    $customer-> post_code = $_POST["Customer"]["post_code"];
    $customer-> phone = $_POST["Customer"]["phone"];
    $customer-> region = $_POST["Customer"]["region"];
    $customer-> password = $_POST["Customer"]["password"];
    $customer-> mail = $_POST["Customer"]["mail"];
    $customer-> validate = $_POST["Customer"]["validate"];
    $customer -> createCustomer();

}