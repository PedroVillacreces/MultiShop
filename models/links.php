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
            $links == "registration" ||
            $links == "products" ||
            $links == "customers" ||
            $links == "subcategories" ||
            $links == "profile" ||
            $links == "slider" ||
            $links == "contactus" ||
            $links == "orders" ||
            $links == "shoppingcart" ||
            $links == "exit"
        ) {

            $module = "views/" . $links . ".php";
        } else if ($links == "index") {
            $module = "views/home.php";
        } else {
            $module = "views/home.php";
        }

        return $module;

    }


}