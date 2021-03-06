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
        echo json_encode(array('Customer' => $response));
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
        echo json_encode(array('id' => $response['id'], 'message' => $response['message']));
    }

    public function getCustomerByEmail()
    {
        $data = $this->mail;
        $response = Customers::getCustomerByEmail($data);
        if ($response)
        {
            return true;
        }

        return false;
    }

    public function doUpdate()
    {
        $data['id_customer']=$this->id_customer;
        $data['name'] = $this->name;
        $data['surname'] = $this->surname;
        $data['address'] = $this->address;
        $data['post_code'] = $this->post_code;
        $data['phone'] = $this->phone;
        $data['region'] = $this->region;
        $data['password'] = $this->password;
        $data['mail'] = $this->mail;
        $data['validate'] = $this->validate;
        $response = Customers::doUpdate($data);
        echo json_encode(array('message' => $response));
    }
}

if (isset($_POST["id_customer"])) {
    $customer= new AjaxCustomer();
    $customer -> id_customer = $_POST["id_customer"];
    $customer -> deleteCustomer();
}

if (isset($_POST["updateAjax"])) {
    $customer= new AjaxCustomer();
    $customer -> id_customer = $_POST["updateAjax"];
    $customer -> updateCustomer();
}

if (isset($_POST["Customer"])) {

    $customer= new AjaxCustomer();
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

if (isset($_POST["mail"])) {
    $customer= new AjaxCustomer();
    $customer-> mail = $_POST["mail"];
}

if (isset($_POST['CustomerUpdate'])) {

    $customer = new AjaxCustomer();

    if(!$_POST["CustomerUpdate"]["validate"])
    {
        $customer ->validate = 0;

    }else{

        $customer->validate = $_POST["CustomerUpdate"]["validate"];
    }

    $customer->id_customer= $_POST["CustomerUpdate"]["id_customer"];
    $customer-> name =  $_POST["CustomerUpdate"]["name"];
    $customer-> surname = $_POST["CustomerUpdate"]["surname"];
    $customer-> address = $_POST["CustomerUpdate"]["address"];
    $customer-> post_code = $_POST["CustomerUpdate"]["post_code"];
    $customer-> phone = $_POST["CustomerUpdate"]["phone"];
    $customer-> region = $_POST["CustomerUpdate"]["region"];
    $customer-> password = $_POST["CustomerUpdate"]["password"];
    $customer-> mail = $_POST["CustomerUpdate"]["mail"];
    $customer -> doUpdate();
}
