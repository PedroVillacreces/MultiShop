<?php

/**
 * Undocumented class
 */
class LinksModels
{
    /**
     * Undocumented function
     *
     * @param [type] $links
     * @return void
     */
    public static function linksModel($links)
    {

        if ($links == "home" ||
            $links == "login" ||
            $links == "slide" ||
            $links == "products" ||
            $links == "categories" ||
            $links == "customers" ||
            $links == "subcategories" ||
            $links == "profile" ||
            $links == "slider" ||
            $links == "users" ||
            $links == "orders" ||
            $links == "comments" ||
            $links == "exit"
        ) {

            $module = "views/" . $links . ".php";
        } else if ($links == "index") {
            $module = "views/login.php";
        } else {
            $module = "views/login.php";
        }

        return $module;

    }


}