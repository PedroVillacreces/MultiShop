<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 7/12/17
 * Time: 18:50
 */
class Profile
{
    public function getCustomerByEmail($data)
    {
        $response = ProfileModels::getCustomerByEmail($data, "customers");
        $counters = ProfileModels::getCountsStatusesByCustomer($response["id_customer"], "deliveries");
        $unpaid = $counters['unpaid'] ? $counters['unpaid'] : 0;
        $paid = $counters['paid'] ? $counters['paid'] : 0;
        $cancel = $counters['cancel'] ? $counters['cancel'] : 0;

        echo
            '<div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic" src=""
                                                                            class="img-circle img-responsive"></div>
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Nombre Cliente:</td>
                                    <td> ' . $response["name"] . ' ' . $response["surname"] . ' </td>
                                </tr>
                                <tr>
                                    <td>Correo Electrónico</td>
                                    <td>' . $response["mail"] . '</td>
                                </tr>
                                <tr>
                                    <td>Dirección</td>
                                    <td>' . $response["address"] . '</td>
                                </tr>                               
                                <tr>
                                    <td>Provincia</td>
                                    <td>' . $response["region"] . '</td>
                                </tr>
                                <tr>
                                    <td>Código Postal</td>
                                    <td>' . $response["post_code"] . '</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>' . $response["phone"] . '</td>
                                </tr>                               
                                </tbody>
                            </table>
                            <a id ="' . $response["id_customer"] . '" href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a id ="' . $response["id_customer"] . '" data-original-title="Remove this user" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </div>
                </div>
                <div class="panel-body col-xs-12 divider text-center">
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong>'. $paid .'</strong></h2>
                        <p>
                            Pedidos Pagados
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong>' . $unpaid . '</strong></h2>
                        <p>
                            Pedidos Pendientes
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong>' . $cancel . '</strong></h2>
                        <p>
                            Pedidos Cancelados
                        </p>
                    </div>
                </div>';
    }

    public function getOrdersByCustomer($data)
    {
        $response = ProfileModels::getOrdersByCustomer($data, "deliveries");

        foreach ($response as $row => $item) {
            echo '<tr class="orders" data-status="'. strtolower($item["4"]) .'">
                      <td>
                            <div class="ckbox"></div>
                      </td>
                      <td>
                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo"> 
                      </td>
                      <td>
                      <a data-toggle="modal" href="#deliveryModal">
                            <div class="media">                                
                                                                  
                                <div class="media-body">
                                    <span class="media-meta pull-right">'. $item["1"].'</span>
                                    <h4 class="title">Pedido número : <strong>'. $item["0"] .'</strong><span class="pull-right ' . strtolower($item["4"]) .'">(' . $item["4"] .')</span></h4>
                                    <p class="summary">Tu pedido se encuentra en estado: <strong>' .$item["5"]. '</strong>. Haz click para ver más detalles de tu pedido</p>
                                </div>
                            </div>
                        </a>
                      </td>
                  </tr>';
        }

    }
}


