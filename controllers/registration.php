<?php

require_once (__DIR__."/../models/registration.php");
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 6/12/17
 * Time: 13:26
 */
class Registration
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
        $response = RegistrationModel::createCustomer($data, 'customers');
        echo json_encode(array('id' => $response['id'], 'message' => $response['message'], 'mail' => $response['mail']));
    }
}

if (isset($_POST["Customer"])) {

    $customer= new Registration();
    $customer-> name =  $_POST["Customer"]["name"];
    $customer-> surname = $_POST["Customer"]["surname"];
    $customer-> address = $_POST["Customer"]["address"];
    $customer-> post_code = $_POST["Customer"]["post_code"];
    $customer-> phone = $_POST["Customer"]["phone"];
    $customer-> region = $_POST["Customer"]["region"];
    $customer-> password = base64_encode($_POST["Customer"]["password"]);
    $customer-> mail = $_POST["Customer"]["mail"];
    $customer-> validate = $_POST["Customer"]["validate"];

    $customer -> createCustomer();
}