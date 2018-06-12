<?php


class Roles
{
    public static function getRolesForUsers()
    {
        $response = RolesModel::showRolesForUsers("roles");
        return $response;
    }
}

