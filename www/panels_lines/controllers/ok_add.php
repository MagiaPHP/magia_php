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
# Fecha de creacion del documento: 2024-09-04 14:09:33 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$panel_id = (isset($_POST["panel_id"]) && $_POST["panel_id"] !=""  && $_POST["panel_id"] !="null" ) ? clean($_POST["panel_id"]) :  null  ;
$icon = (isset($_POST["icon"]) && $_POST["icon"] !=""  && $_POST["icon"] !="null" ) ? clean($_POST["icon"]) :  null  ;
$label = (isset($_POST["label"]) && $_POST["label"] !=""  && $_POST["label"] !="null" ) ? clean($_POST["label"]) :  null  ;
$translate = (isset($_POST["translate"]) && $_POST["translate"] !="" ) ? clean($_POST["translate"]) : 1 ;
$url = (isset($_POST["url"]) && $_POST["url"] !=""  && $_POST["url"] !="null" ) ? clean($_POST["url"]) :  null  ;
$badge = (isset($_POST["badge"]) && $_POST["badge"] !=""  && $_POST["badge"] !="null" ) ? clean($_POST["badge"]) :  null  ;
$controller = (isset($_POST["controller"]) && $_POST["controller"] !=""  && $_POST["controller"] !="null" ) ? clean($_POST["controller"]) :  null  ;
$action = (isset($_POST["action"]) && $_POST["action"] !=""  && $_POST["action"] !="null" ) ? clean($_POST["action"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !=""  && $_POST["order_by"] !="null" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !=""  && $_POST["status"] !="null" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$panel_id) {                        
    array_push($error, 'Panel id is mandatory');
}
if (!$label) {                        
    array_push($error, 'Label is mandatory');
}
if (!$translate) {                        
    array_push($error, 'Translate is mandatory');
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

if (! panels_lines_is_panel_id($panel_id) ) {
    array_push($error, 'Panel id format error');
}
if (! panels_lines_is_label($label) ) {
    array_push($error, 'Label format error');
}
if (! panels_lines_is_translate($translate) ) {
    array_push($error, 'Translate format error');
}
if (! panels_lines_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! panels_lines_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( panels_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = panels_lines_add(
        $panel_id ,  $icon ,  $label ,  $translate ,  $url ,  $badge ,  $controller ,  $action ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=panels_lines");
            break;
            
        case 2:
            header("Location: index.php?c=panels_lines&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=panels_lines&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=panels_lines&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=panels_lines&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


