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
# Fecha de creacion del documento: 2024-09-04 08:09:09 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$controller = (isset($_POST["controller"]) && $_POST["controller"] !=""  && $_POST["controller"] !="null" ) ? clean($_POST["controller"]) :  null  ;
$tag = (isset($_POST["tag"]) && $_POST["tag"] !=""  && $_POST["tag"] !="null" ) ? clean($_POST["tag"]) :  null  ;
$replace_by = (isset($_POST["replace_by"]) && $_POST["replace_by"] !=""  && $_POST["replace_by"] !="null" ) ? clean($_POST["replace_by"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$controller) {                        
    array_push($error, 'Controller is mandatory');
}
if (!$tag) {                        
    array_push($error, 'Tag is mandatory');
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

if (! doc_tags_is_controller($controller) ) {
    array_push($error, 'Controller format error');
}
if (! doc_tags_is_tag($tag) ) {
    array_push($error, 'Tag format error');
}
if (! doc_tags_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! doc_tags_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( doc_tags_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = doc_tags_add(
        $controller ,  $tag ,  $replace_by ,  $description ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=doc_tags");
            break;
            
        case 2:
            header("Location: index.php?c=doc_tags&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=doc_tags&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=doc_tags&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=doc_tags&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


