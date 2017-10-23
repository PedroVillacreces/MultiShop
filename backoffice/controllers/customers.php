<?php

/**
 * Undocumented class
 */
class Customers
{
    public function showCustomers()
    {
        $response = CustomersModel::showCustomers("customers");
        
                foreach($response as $row => $item){

                    echo
                    '<tr id="item'.$item['id_customer'].'">
                        <td>'.$item['name'].'</td>
                        <td>'.$item['surname'].'</td>
                        <td>'.$item['mail'].'</td>
                        <td>'.$item['address'].'</td>
                        <td>'.$item['post_code'].'</td>
                        <td>'.$item['region'].'</td>
                        <td>'.$item['phone'].'</td>
                        <td>
                            <form method="post" id="formDelete">
                                <input type="submit" name="id_customer" id="id_customer" onclick= deleteCustomer('.$item['id_customer'].') class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </input>
                            </form>
                        </td>
                    </tr>';        
                }
    }

    public static function deleteCustomers($data)
    {
        $response = CustomersModel::deleteCustomer($data, "customers");
        echo $response;
    }

}

