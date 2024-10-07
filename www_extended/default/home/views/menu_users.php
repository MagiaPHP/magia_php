<?php

if (permissions_has_permission($u_rol, "shop", "read")) {
    // MENU PARA LOS DE SHOP
    include view("home", "menu_shop");
//    include view("home", "breadcrumb_labo");
} else {

    if ($config_theme == "factux") {
        include view("home", "menu_factux");
    } else {
        include view("home", "menu_root");
        switch ($c) {
            case 'doc_models': // no pongo nada
                //include view("home", "breadcrumb_root");
                break;

            default:
                  include view("home", "breadcrumb_root");
                break;
        }
    }

    if ($u_rol == 'root' && $config_theme == "factux") {
        include view("home", "menu_root");
    }
}
?>