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
# Fecha de creacion del documento: 2024-10-03 18:10:04 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$company_id = (isset($_POST["company_id"]) && $_POST["company_id"] !=""  && $_POST["company_id"] !="null" ) ? clean($_POST["company_id"]) :  null  ;
$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] !=""  && $_POST["contact_id"] !="null" ) ? clean($_POST["contact_id"]) :  null  ;
$owner_ref = (isset($_POST["owner_ref"]) && $_POST["owner_ref"] !=""  && $_POST["owner_ref"] !="null" ) ? clean($_POST["owner_ref"]) :  null  ;
$date = (isset($_POST["date"]) && $_POST["date"] !="" ) ? clean($_POST["date"]) : current_timestamp() ;
$cargo = (isset($_POST["cargo"]) && $_POST["cargo"] !=""  && $_POST["cargo"] !="null" ) ? clean($_POST["cargo"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !=""  && $_POST["order_by"] !="null" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !=""  && $_POST["status"] !="null" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$contact_id) {                        
    array_push($error, 'Contact id is mandatory');
}
if (!$date) {                        
    array_push($error, 'Date is mandatory');
}
if (!$cargo) {                        
    array_push($error, 'Cargo is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! employees_is_contact_id($contact_id) ) {
    array_push($error, 'Contact id format error');
}
if (! employees_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! employees_is_cargo($cargo) ) {
    array_push($error, 'Cargo format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( employees_search_by_unique("id","contact_id", $contact_id)){
    array_push($error, 'Contact id already exists in data base');
}

  
//if( employees_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = employees_add(
        $company_id ,  $contact_id ,  $owner_ref ,  $date ,  $cargo ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=employees");
            break;
            
        case 2:
            header("Location: index.php?c=employees&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=employees&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=employees&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=employees&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


