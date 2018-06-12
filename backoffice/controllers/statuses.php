<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/12/17
 * Time: 23:02
 */
class Statuses
{
    public static function getStatusesForOrder()
    {
        $response = StatusesModel::showStatusesForOrder("delivery_status");
        return $response;
    }
}