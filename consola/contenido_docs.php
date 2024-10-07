<?php

function contenido_docs($section, $plugin, $archivo) {

    switch ($section) {

        case 'controllers':
            return contenido_docs_controllers($plugin, $archivo);
            break;

        case 'models':
            return contenido_docs_models($plugin, $archivo);
            break;

        default: // views
            return contenido_docs_views($plugin, $archivo);
            break;
    }
}

function contenido_docs_controllers($plugin, $archivo) {

    global $config_destino;

    switch ($archivo) {

        ## add.php        
        case "add.php":
        case "add.php.md":
            $contenido = "#add.php  \n";

            $contenido .= "\n";
            $contenido .= "## Plugin : Types \n";
            $contenido .= "## controllers : add.php \n";
            $contenido .= "##  \n";
            $contenido .= "Url doc: http://magiaphp.com/docs/001/types/controllers/add.php \n";

            $contenido .= "\n";
            $contenido .= "Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";

            $contenido .= "\n";
            $contenido .= "Documento accesible via la siguiente url:  \n";

            $contenido .= '
`
if (!permissions_has_permission($u_rol, $c, "create")) {    
    header("Location: index.php?c=home&a=no_access");
    
    die("Error has permission ");
}

include view("types", "add");
`


#mg 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    #mg si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");

    #mg y matamos el proceso 
    die("Error has permission ");
}

#mg 2) si ha pasado el control anterior, incluimos la vista `add`                
include view("types", "add");

';

            $contenido .= "http://localhost/index.php?c={$plugin}&a=add \n";

            $contenido .= "\n";
            $contenido .= '';
            break;

        default:

            $contenido = "# Modelo por defecto \n";
            $contenido .= "\n";
            $contenido .= "# Documento creado con mago de Magia_PHP \n";
            $contenido .= "\n";
            $contenido .= "# http://magiaphp.com \n";
            $contenido .= "\n";
            $contenido .= "# Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
            $contenido .= "\n";
            $contenido .= "";
            break;
    }


    return $contenido;
}

function contenido_docs_models($plugin, $archivo) {

    global $config_destino;
    switch ($archivo) {

        ## add.php
        case "add.php":
            $contenido = "";
            $contenido .= "# Documento creado con mago de Magia_PHP \n";
            $contenido .= "http://magiaphp.com \n";
            $contenido .= "Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
            $contenido .= "Documento accesible via la siguiente url:  \n";
            $contenido .= "http://localhost/index.php?c={$plugin}&a=add \n";
            $contenido .= "\n";
            $contenido .= '';
            break;

        default:

            $contenido = "# \n";
            $contenido .= "# Documento creado con mago de Magia_PHP \n";
            $contenido .= "# http://magiaphp.com \n";
            $contenido .= "# Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
            $contenido .= "";
            break;
    }


    return "$contenido";
}

function contenido_docs_views($plugin, $archivo) {

    global $config_destino;
    switch ($archivo) {

        ## add.php
        case "add.php":
            $contenido = "";
            $contenido .= "# Documento creado con mago de Magia_PHP \n";
            $contenido .= "http://magiaphp.com \n";
            $contenido .= "Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
            $contenido .= "Documento accesible via la siguiente url:  \n";
            $contenido .= "http://localhost/index.php?c={$plugin}&a=add \n";
            $contenido .= "\n";
            $contenido .= '';
            break;

        default:

            $contenido = "# \n";
            $contenido .= "# Documento creado con mago de Magia_PHP \n";
            $contenido .= "# http://magiaphp.com \n";
            $contenido .= "# Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
            $contenido .= "";
            break;
    }


    return "$contenido";
}
