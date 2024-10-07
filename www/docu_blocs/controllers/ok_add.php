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
# Fecha de creacion del documento: 2024-09-22 18:09:53 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$docu_id = (isset($_POST["docu_id"]) && $_POST["docu_id"] !=""  && $_POST["docu_id"] !="null" ) ? clean($_POST["docu_id"]) :  null  ;
$bloc = (isset($_POST["bloc"]) && $_POST["bloc"] !=""  && $_POST["bloc"] !="null" ) ? clean($_POST["bloc"]) :  null  ;
$title = (isset($_POST["title"]) && $_POST["title"] !=""  && $_POST["title"] !="null" ) ? clean($_POST["title"]) :  null  ;
$post = (isset($_POST["post"]) && $_POST["post"] !=""  && $_POST["post"] !="null" ) ? clean($_POST["post"]) :  null  ;
$h = (isset($_POST["h"]) && $_POST["h"] !=""  && $_POST["h"] !="null" ) ? clean($_POST["h"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$docu_id) {                        
    array_push($error, 'Docu id is mandatory');
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

if (! docu_blocs_is_docu_id($docu_id) ) {
    array_push($error, 'Docu id format error');
}
if (! docu_blocs_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! docu_blocs_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( docu_blocs_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = docu_blocs_add(
        $docu_id ,  $bloc ,  $title ,  $post ,  $h ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=docu_blocs");
            break;
            
        case 2:
            header("Location: index.php?c=docu_blocs&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=docu_blocs&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=docu_blocs&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=docu_blocs&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


