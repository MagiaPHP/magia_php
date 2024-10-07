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
# Fecha de creacion del documento: 2024-09-04 08:09:04 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$section = (isset($_POST["section"]) && $_POST["section"] !=""  && $_POST["section"] !="null" ) ? clean($_POST["section"]) :  null  ;
$open = (isset($_POST["open"]) && $_POST["open"] !=""  && $_POST["open"] !="null" ) ? clean($_POST["open"]) :  null  ;
$items = (isset($_POST["items"]) && $_POST["items"] !=""  && $_POST["items"] !="null" ) ? clean($_POST["items"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$section) {                        
    array_push($error, 'Section is mandatory');
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

if (! doc_sections_is_section($section) ) {
    array_push($error, 'Section format error');
}
if (! doc_sections_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! doc_sections_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( doc_sections_search_by_unique("id","section", $section)){
    array_push($error, 'Section already exists in data base');
}

  
//if( doc_sections_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = doc_sections_add(
        $section ,  $open ,  $items ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=doc_sections");
            break;
            
        case 2:
            header("Location: index.php?c=doc_sections&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=doc_sections&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=doc_sections&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=doc_sections&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


