<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/12/17
 * Time: 23:01
 */
class Dispaths
{
    public static function getDispathsForOrder()
    {
        $response = DispathsModel::showDispathsForOrder("dispatch_status");
        return $response;
    }
}