<?php 
###################################################### 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:12 
######################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? ($_REQUEST["redi"]) : false;


$error = array();

if ($data == "") {
    array_push($error, "Data is mandatory");
}

################################################################################
################################################################################
################################################################################
if (!$error) {
    
    _options_push("inv_periods_index_cols_to_show", json_encode($data), "inv_periods");

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php");
            break;
        
        case 2:
            header("Location: index.php?c=inv_periods");
            break;
        
        case 3:
            header("Location: index.php?c=inv_periods&a=details&id=" . $redi['id']);
            break;        

        default:
            header("Location: index.php");

            break;
    }
} else {

    include view("home", "pageError");
}







