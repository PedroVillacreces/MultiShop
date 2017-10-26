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
                            <form role="form" method="POST" id="deleteCustomer">
                                <button type="button" name="deleteCustomer" id="deleteCustomer" class="deleteButton btn btn-danger btn-sm" data-id="'.$item['id_customer'].'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>
                        <td>     
                        <form role="form" method="POST" id="updateCustomer">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="updateCustomer" id="updateCustomer" class="updateButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="'.$item['id_customer'].'">
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
        return $response;
    }

    public static function updateCustomers($data)
    {
        $response = CustomersModel::updateCustomers($data, 'customers');
        return $response;
    }

    public static function getByIdCustomers($data)
    {
        $response = CustomersModel::getCustomerById($data, 'customers');
        return $response;
    }

    public static function createCustomer($data)
    {
        $response = CustomersModel::createCustomer($data, 'customers');
        return $response;
    }

    public static function getCustomerByEmail($data)
    {
        $response = CustomersModel::getCustomerByEmail($data, 'customers');
        return $response;
    }

}

