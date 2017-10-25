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
                                <button type="submit" name="id_customer" id="id_customer" onclick= deleteCustomer('.$item['id_customer'].') class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>
                        <td>     
                            <form method="post" id="formUpdate">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="submit" name="update" id="update" class="btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" onclick= getCustomerById('.$item['id_customer'].') >
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
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

    public static function updateCustomers($data)
    {
        $response = CustomersModel::updateCustomers($data, 'customers');
        echo $response;
    }

    public static function getByIdCustomers($data)
    {
        $response = CustomersModel::getCustomerById($data, 'customers');
        echo $response;
    }

    public static function createCustomer($data)
    {
        $response = CustomersModel::createCustomer($data, 'customers');
        echo $response;
    }

}

