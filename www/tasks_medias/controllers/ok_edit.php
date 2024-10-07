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
# Fecha de creacion del documento: 2024-09-26 17:09:18 
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
$task_id = (isset($_POST["task_id"]) && $_POST["task_id"] !=""  && $_POST["task_id"] !="null" ) ? clean($_POST["task_id"]) :  null  ;
$type = (isset($_POST["type"]) && $_POST["type"] !=""  && $_POST["type"] !="null" ) ? clean($_POST["type"]) :  null  ;
$url = (isset($_POST["url"]) && $_POST["url"] !=""  && $_POST["url"] !="null" ) ? clean($_POST["url"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$type) {
    array_push($error, 'Type is mandatory');
}
if (!$url) {
    array_push($error, 'Url is mandatory');
}
if (!$description) {
    array_push($error, 'Description is mandatory');
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

if (! tasks_medias_is_type($type) ) {
    array_push($error, 'Type format error');
}
if (! tasks_medias_is_url($url) ) {
    array_push($error, 'Url format error');
}
if (! tasks_medias_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! tasks_medias_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! tasks_medias_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( tasks_medias_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    tasks_medias_edit(
        $id ,  $task_id ,  $type ,  $url ,  $description ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=tasks_medias");
            break;
            
        case 2:
            header("Location: index.php?c=tasks_medias&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=tasks_medias&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=tasks_medias&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=tasks_medias&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
