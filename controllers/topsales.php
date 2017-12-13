<?php

require_once (__DIR__."/../models/topsalesmodel.php");

class TopSales
{
    public function getTopSales(){
        $response = TopSalesModel::getTopSales("products");

        foreach ($response as $row => $item) {
            $picture = $item['picture'] ? $item['picture'] : "multimedia/images/products/dummy.jpg";
            echo '<div class="col-sm-6 col-md-4" style="margin-bottom: 20px;">
                    <div class="thumbnail">
                        <h3>' . $item['product_name'] . '</h3>
                        <img src="backoffice/' . $picture . '" alt="">
                        <div class="caption">                            
                            <p>'  . $item['price'] .'€</p>                          
                            <div class="toolAdd">
                                <div class="numbers-row">                                   
                                    <input type="text" name="french-hens" id="buttonsincre" value="1">
                                </div>
                                <button type="submit" id="' . $item['id_product'] . '" class="btn btn-primary buyit" role="button" style="background-color:#222; border-color:#222;">Comprar</button>
                                <a data-toggle="modal" href="#viewCartModal" class="btn btn-default view-product" data-id="' . $item['id_product'] . '" role="button">Ver Ficha</a>
                            </div>                          
                        </div>
                    </div>
                  </div>';
        }
    }
}