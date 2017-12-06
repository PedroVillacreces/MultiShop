<?php
require_once "../../models/orders.php";
require_once "../../controllers/orders.php";

class AjaxOrders
{
    public $id_delivery;
    public $delivery_date;
    public $amount;
    public $payment;
    public $dispath;
    public $status;

    public function getOrderById()
    {
        $data = $this->id_delivery;

        $response = Orders::getOrderById($data);
        echo json_encode(array('Order' => $response));
    }

}

if (isset($_POST["getDeliveryById"])) {
    $order = new AjaxOrders();
    $order->id_delivery = $_POST["getDeliveryById"];
    $order->getOrderById();
}