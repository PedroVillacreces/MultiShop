<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/12/17
 * Time: 23:00
 */
class Payments
{
    public static function getPaymentsForOrder()
    {
        $response = PaymentsModel::showPaymentsForOrder("payments");
        return $response;
    }
}