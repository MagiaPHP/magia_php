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
# Fecha de creacion del documento: 2024-09-27 12:09:58 
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
$num_code = (isset($_POST["num_code"]) && $_POST["num_code"] !="" ) ? clean($_POST["num_code"]) :  null  ;
$alpha_2_code = (isset($_POST["alpha_2_code"]) && $_POST["alpha_2_code"] !=""  && $_POST["alpha_2_code"] !="null" ) ? clean($_POST["alpha_2_code"]) :  null  ;
$alpha_3_code = (isset($_POST["alpha_3_code"]) && $_POST["alpha_3_code"] !=""  && $_POST["alpha_3_code"] !="null" ) ? clean($_POST["alpha_3_code"]) :  null  ;
$en_short_name = (isset($_POST["en_short_name"]) && $_POST["en_short_name"] !=""  && $_POST["en_short_name"] !="null" ) ? clean($_POST["en_short_name"]) :  null  ;
$nationality = (isset($_POST["nationality"]) && $_POST["nationality"] !=""  && $_POST["nationality"] !="null" ) ? clean($_POST["nationality"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$num_code) {
    array_push($error, 'Num code is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! nationalities_is_num_code($num_code) ) {
    array_push($error, 'Num code format error');
}
if (! nationalities_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! nationalities_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( nationalities_search_by_unique("id","num_code", $num_code)){
    array_push($error, 'Num code already exists in data base');
}


if( nationalities_search_by_unique("id","alpha_2_code", $alpha_2_code)){
    array_push($error, 'Alpha 2 code already exists in data base');
}


if( nationalities_search_by_unique("id","alpha_3_code", $alpha_3_code)){
    array_push($error, 'Alpha 3 code already exists in data base');
}

  
//if( nationalities_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    nationalities_edit(
        $id ,  $num_code ,  $alpha_2_code ,  $alpha_3_code ,  $en_short_name ,  $nationality ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=nationalities");
            break;
            
        case 2:
            header("Location: index.php?c=nationalities&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=nationalities&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=nationalities&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=nationalities&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
