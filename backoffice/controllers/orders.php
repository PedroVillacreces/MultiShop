<?php

class Orders
{
    public $id_delivery;
    public $delivery_date;
    public $id_customer;
    public $amount;
    public $payment;
    public $dispath;
    public $status;

    public function showOrders()
    {
        $response = OrdersModel::showOrders("deliveries");

        foreach ($response as $row => $item) {
            echo
                '<tr id="item'.$item['0'].'">
                        <td class="id_delivery">'.$item['0'].'</td> 
                        <td class="delivery_date">'.$item['1'].'</td> 
                        <td class="amount">'.$item['2'].'</td>
                         <td class="payment">'.$item['5'].'</td> 
                         <td class="dispath">'.$item['7'].'</td>
                         <td class="status">' .$item['6']. '</td>
                         <td class="customer">'.$item['3']. ' ' . $item['4'].'</td> 
                        <td>
                            <form role="form" method="POST" id="deleteOrder">
                                <button type="submit" name="deleteOrder" id="deleteOrder" class="deleteOrderButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="'.$item['0'].'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>  
                        <td>     
                        <form role="form" method="POST" id="getDeliveryById">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="getDeliveryById" id="getDeliveryById" class="updateDeliveryButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="'.$item['0'].'">
                                            <input type="hidden" name="updateId" value="'.$item['0'].'">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                            </form>                           
                        </td>      
                    </tr>';
        }
    }

    public function deleteOrder()
    {
        $response = OrdersModel::deleteOrder($this->id_delivery, "deliveries");
        return $response;
    }

    public static function getOrderById($data)
    {
        $response = OrdersModel::getOrderById($data, 'deliveries');
        return $response;
    }

    public function updateOrder($data)
    {
        $response = OrdersModel::updateOrder($data, 'deliveries');
        return $response;
    }
}

if (isset($_POST["deleteOrder"])) {
    $message = '¿Está seguro que desea eliminar el pedido?';
    echo "<script type='text/javascript'>alert($message);</script>";
    $order = new Orders();
    $order -> id_delivery = $_POST["deleteId"];
    $order -> deleteOrder();
}

if (isset($_POST["updateOrder"]))
{
    $order = new Orders();
    $order->id_delivery = $_POST['id_order-update'];
    $order->payment = $_POST['payment'];
    $order->dispath = $_POST['dispath'];
    $order->status = $_POST['status'];

    $order->updateOrder($order);

}