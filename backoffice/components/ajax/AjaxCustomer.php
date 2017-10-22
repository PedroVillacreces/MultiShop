<?php
require_once "../../models/customers.php";
require_once "../../controllers/customers.php";

class AjaxCustomer
{
    public $id_customer;

    public function deleteCustomer()
    {
        $data = $this->id_customer;
        $response = Customers::deleteCustomers($data);
        echo $response;
    }

}

if(isset($_POST["id_customer"])){
    
    $customer= new AjaxCustomer();
    $customer -> id_customer = $_POST["id_customer"];
    $customer -> deleteCustomer();

}