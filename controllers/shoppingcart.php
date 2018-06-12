<?php
require_once(__DIR__ . "/../models/shoppingcart.php");

class ShoppingCart
{
    public $id_product;
    public $quantity;
    public $time;
    public $subtotal;
    public $method;
    public $status;
    public $products;
    public $payment;

    public function addCart()
    {
        $response = ShoppingCartModel::getProductById($this->id_product, "products");
        $empty = "";
        $quantity = isset($this->quantity) ? $this->quantity : 1;
        $itemArray = array(
            $response['id_product'] => array('name' => $response['product_name'],
                'id' => $response['id_product'],
                'quantity' => $quantity,
                'price' => $response["price"]));
        session_start();
        if (!empty($_SESSION["cart_item"])) {
            $key = array_search($response['id_product'], array_column($_SESSION["cart_item"], 'id'));
            if (is_numeric($key)) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($response['id_product'] == $v['id']) {
                        if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                            $_SESSION["cart_item"][$k]["quantity"] = 0;
                        }
                        $_SESSION["cart_item"][$k]["quantity"] += $quantity;
                    }
                }
            } else {
                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
            }
        } else {
            $_SESSION["cart_item"] = $itemArray;
        }

        echo json_encode($_SESSION['cart_item']);
    }

    public function deleteCart(){
        session_start();
        if(!empty($_SESSION["cart_item"])) {
            $message = "";
            foreach($_SESSION["cart_item"] as $k => $v) {
                if ($this->id_product == $v['id']) {
                    if ($v['quantity'] == $this->quantity) {
                        unset($_SESSION["cart_item"][$k]);
                        $message = "deleted";
                    } else if ($v['quantity'] < $this->quantity) {
                        $message = "error";
                    } else {
                        $_SESSION['cart_item'][$k]['quantity'] = intval($v['quantity']) - intval($this->quantity);
                        $message = "updated";
                    }

                    if (empty($_SESSION["cart_item"])) unset($_SESSION["cart_item"]);
                }
            }
            echo json_encode(array("message" => $message));
        }
    }

    public function getPayments()
    {

        $response = ShoppingCartModel::getPayments("payments");
        foreach ($response as $row => $item) {
            if ($item['id_payment'] == 2) {
                echo '
                 <div class="radio">
                      <label><input class="payment-radio" type="radio" name="optradio1" id="' . $item['id_payment'] . '" checked>' . $item['type'] . '</label>
                 </div>                      
            ';
            } else {
                echo '
                <div class="radio">
                      <label><input class="payment-radio" type="radio" name="optradio1" id="' . $item['id_payment'] . '">' . $item['type'] . '</label>
                 </div>            
            ';
            }
        }
    }

    public function getDispacth()
    {
        $response = ShoppingCartModel::getPayments("dispatch_method");
        foreach ($response as $row => $item) {
            if ($item['id_method'] ==3) {
                echo '
                 <div class="radio">
                      <label><input id="' . $item['id_method'] . '" class="pay-method" type="radio" name="optradio" value="' . $item['price_method'] . '" checked>' . $item['method'] . ' ('.$item['price_method'].' €)</label>
                 </div>                      
            ';
            } else {
                echo '
                <div class="radio">
                      <label><input id="' . $item['id_method'] . '" class="pay-method" type="radio" name="optradio" value="' . $item['price_method'] . '">' . $item['method'] . '  ('.$item['price_method'].' €)</label>
                 </div>            
            ';
            }
        }
    }

    public function submitOrder()
    {
        session_start();
        $date = new DateTime();
        date_timestamp_set($date, $this->time);
        $date_time = date_format($date,"Y-m-d H:i:s");

        $data = [
            "time" => $date_time,
            "amount" => preg_replace('/\D/', '', $this->subtotal),
            "method" => $this->method,
            "status" => $this->status,
            "customer" => $_SESSION['id'],
            "payment" => $this->payment,
            "dispatch" => "2"
        ];
        $response = ShoppingCartModel::submitOrder($data, "deliveries");

        if(isset($response['id'])){

            foreach ($this->products as $row => $item) {
                $data = [
                    "id_product" => $item['id'],
                    "quantity" => $item['quantity'],
                    "id_delivery" =>$response['id']
                ];

                ShoppingCartModel::submitOrderDetails($data, "delivery_details");
                $product = ShoppingCartModel::getProductById($item['id'], "products");
                if (!$product['topsales']){
                    $product['topsales'] = 0;
                }
                $newTopSales = $product['topsales'] + intval($item['quantity']);
                ShoppingCartModel::updateTopSales($newTopSales, $item['id'],"products");
            }
            session_start();
            unset($_SESSION["cart_item"]);

            echo json_encode(array("message" => "ok"));
        }
        else{
            echo json_encode(array("message" => "error"));
        }
    }
}

if (isset($_POST["buyProduct"])) {
    $shopping = new ShoppingCart();
    $shopping->id_product = $_POST["buyProduct"]["id_product"];
    $shopping->quantity = $_POST["buyProduct"]["quantity"];
    $shopping->addCart();
}

if (isset($_POST["deleteFromCart"])) {
    $shopping = new ShoppingCart();
    $shopping->id_product = $_POST["deleteFromCart"]["id_product"];
    $shopping->quantity = $_POST["deleteFromCart"]["quantityDelete"];
    $shopping->deleteCart();
}

if (isset($_POST["submitOrderTransfer"])) {
    $shopping = new ShoppingCart();
    $shopping->time = $_POST["submitOrderTransfer"]["time"];
    $shopping->subtotal = $_POST["submitOrderTransfer"]["subtotal"];
    $shopping->method = $_POST["submitOrderTransfer"]["method"];
    $shopping->status = $_POST["submitOrderTransfer"]["status"];
    $shopping->payment = $_POST["submitOrderTransfer"]["payment"];
    $shopping->products = $_POST["submitOrderTransfer"]["products"];
    $shopping->submitOrder();
}