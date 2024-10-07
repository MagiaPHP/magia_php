<?php 
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
# Fecha de creacion del documento: 2024-09-04 08:09:26 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `delete` 
if (!permissions_has_permission($u_rol, $c, "delete")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$id   = (isset($_REQUEST["id"])   && $_REQUEST["id"]   !="" )  ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] !="" ) ? ($_REQUEST["redi"]) : false;
$error = array();
#################################################################################

# REQUERIDO
#################################################################################

if (! $id) {
    array_push($error, "Id is mandatory");
}
#################################################################################

# FORMAT
#################################################################################

if (! emails_is_id($id)) {
    array_push($error, 'Id format error');
}
#################################################################################

# CONDICIONAL
#################################################################################

if ( !$error) {
    
        emails_delete(
                $id
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=emails");
            break;
            
        case 2:
            header("Location: index.php?c=emails&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=emails&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=emails&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=emails&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    





} else {

    include view("home", "pageError");
}  
