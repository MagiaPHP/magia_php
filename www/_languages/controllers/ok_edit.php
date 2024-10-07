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
# Fecha de creacion del documento: 2024-09-29 09:09:07 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$language = (isset($_POST["language"]) && $_POST["language"] !=""  && $_POST["language"] !="null" ) ? clean($_POST["language"]) :  null  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !=""  && $_POST["order_by"] !="null" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !=""  && $_POST["status"] !="null" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################


#################################################################################

# FORMAT
#################################################################################


#################################################################################

# CONDITIONAL
#################################################################################


if( _languages_search_by_unique("id","language", $language)){
    array_push($error, 'Language already exists in data base');
}


if( _languages_search_by_unique("id","name", $name)){
    array_push($error, 'Name already exists in data base');
}

  
//if( _languages_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    _languages_edit(
        $id ,  $language ,  $name ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=_languages");
            break;
            
        case 2:
            header("Location: index.php?c=_languages&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=_languages&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=_languages&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=_languages&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
