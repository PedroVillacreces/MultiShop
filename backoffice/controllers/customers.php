<?php

/**
 * Undocumented class
 */
class Customers
{
    public function showCustomers()
    {
        $response = CustomersModel::showCustomers("customers");

        foreach ($response as $row => $item) {
            echo
                '<tr id="customersRow' . $item['id_customer'] . '">
                        <td class="name">' . $item['name'] . '</td>
                        <td class="surname">' . $item['surname'] . '</td>
                        <td class="mail">' . $item['mail'] . '</td>
                        <td class="address">' . $item['address'] . '</td>
                        <td class="post_code">' . $item['post_code'] . '</td>
                        <td class="region">' . $item['region'] . '</td>
                        <td class="phone">' . $item['phone'] . '</td>
                        <td>
                            <form role="form" method="POST" id="deleteCustomer">
                                <button type="button" name="deleteCustomer" id="deleteCustomer" class="deleteButton btn btn-danger btn-sm" data-id="' . $item['id_customer'] . '">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>
                        <td>     
                        <form role="form" method="POST" id="updateCustomer">                       
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="updateCustomer" id="updateCustomer" class="updateButton btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="' . $item['id_customer'] . '">
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

    public static function doUpdate($data)
    {
        $customer = CustomersModel::getCustomerById($data["id_customer"], "customers");
        if ($data["mail"] == $customer["mail"]) {
            $data["password"] = $data["password"] == $customer['password'] ? $data["password"] : base64_encode($data["password"]);
            $response = CustomersModel::doUpdate($data, "customers");
            return $response;
        } else {
            $customerByemail = CustomersModel::getCustomerByEmail($data["mail"], "customers");
            if ($customerByemail) {
                echo '<script>', 'alert("El mail elegido ya existe en la Base de Datos, inténtelo con otro");', '</script>';
                return "error";
            } else {
                $data["password"] = $data["password"] == $customer['password'] ? $data["password"] : base64_encode($data["password"]);
                $response = CustomersModel::doUpdate($data, "customers");
                return $response;
            }
        }

    }
}
