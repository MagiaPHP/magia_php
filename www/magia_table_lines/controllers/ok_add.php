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
# Fecha de creacion del documento: 2024-08-31 17:08:04 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$table_id = (isset($_POST["table_id"]) && $_POST["table_id"] !=""  && $_POST["table_id"] !="null" ) ? clean($_POST["table_id"]) :  null  ;
$header_icon = (isset($_POST["header_icon"]) && $_POST["header_icon"] !=""  && $_POST["header_icon"] !="null" ) ? clean($_POST["header_icon"]) :  null  ;
$header_pre_label = (isset($_POST["header_pre_label"]) && $_POST["header_pre_label"] !=""  && $_POST["header_pre_label"] !="null" ) ? clean($_POST["header_pre_label"]) :  null  ;
$header_label = (isset($_POST["header_label"]) && $_POST["header_label"] !=""  && $_POST["header_label"] !="null" ) ? clean($_POST["header_label"]) :  null  ;
$header_url = (isset($_POST["header_url"]) && $_POST["header_url"] !=""  && $_POST["header_url"] !="null" ) ? clean($_POST["header_url"]) :  null  ;
$header_post_label = (isset($_POST["header_post_label"]) && $_POST["header_post_label"] !=""  && $_POST["header_post_label"] !="null" ) ? clean($_POST["header_post_label"]) :  null  ;
$body_icon = (isset($_POST["body_icon"]) && $_POST["body_icon"] !=""  && $_POST["body_icon"] !="null" ) ? clean($_POST["body_icon"]) :  null  ;
$body_pre_label = (isset($_POST["body_pre_label"]) && $_POST["body_pre_label"] !=""  && $_POST["body_pre_label"] !="null" ) ? clean($_POST["body_pre_label"]) :  null  ;
$body_label = (isset($_POST["body_label"]) && $_POST["body_label"] !=""  && $_POST["body_label"] !="null" ) ? clean($_POST["body_label"]) :  null  ;
$body_post_label = (isset($_POST["body_post_label"]) && $_POST["body_post_label"] !=""  && $_POST["body_post_label"] !="null" ) ? clean($_POST["body_post_label"]) :  null  ;
$footer_icon = (isset($_POST["footer_icon"]) && $_POST["footer_icon"] !=""  && $_POST["footer_icon"] !="null" ) ? clean($_POST["footer_icon"]) :  null  ;
$footer_pre_label = (isset($_POST["footer_pre_label"]) && $_POST["footer_pre_label"] !=""  && $_POST["footer_pre_label"] !="null" ) ? clean($_POST["footer_pre_label"]) :  null  ;
$footer_label = (isset($_POST["footer_label"]) && $_POST["footer_label"] !=""  && $_POST["footer_label"] !="null" ) ? clean($_POST["footer_label"]) :  null  ;
$footer_post_label = (isset($_POST["footer_post_label"]) && $_POST["footer_post_label"] !=""  && $_POST["footer_post_label"] !="null" ) ? clean($_POST["footer_post_label"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$permission = (isset($_POST["permission"]) && $_POST["permission"] !="" ) ? clean($_POST["permission"]) : 0000 ;
$align = (isset($_POST["align"]) && $_POST["align"] !="" ) ? clean($_POST["align"]) : L ;
$show = (isset($_POST["show"]) && $_POST["show"] !="" ) ? clean($_POST["show"]) : 1 ;
$translate = (isset($_POST["translate"]) && $_POST["translate"] !="" ) ? clean($_POST["translate"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$table_id) {                        
    array_push($error, 'Table id is mandatory');
}
if (!$permission) {                        
    array_push($error, 'Permission is mandatory');
}
if (!$align) {                        
    array_push($error, 'Align is mandatory');
}
if (!$show) {                        
    array_push($error, 'Show is mandatory');
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

if (! magia_table_lines_is_table_id($table_id) ) {
    array_push($error, 'Table id format error');
}
if (! magia_table_lines_is_permission($permission) ) {
    array_push($error, 'Permission format error');
}
if (! magia_table_lines_is_align($align) ) {
    array_push($error, 'Align format error');
}
if (! magia_table_lines_is_show($show) ) {
    array_push($error, 'Show format error');
}
if (! magia_table_lines_is_translate($translate) ) {
    array_push($error, 'Translate format error');
}
if (! magia_table_lines_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! magia_table_lines_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( magia_table_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = magia_table_lines_add(
        $table_id ,  $header_icon ,  $header_pre_label ,  $header_label ,  $header_url ,  $header_post_label ,  $body_icon ,  $body_pre_label ,  $body_label ,  $body_post_label ,  $footer_icon ,  $footer_pre_label ,  $footer_label ,  $footer_post_label ,  $description ,  $permission ,  $align ,  $show ,  $translate ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=magia_table_lines");
            break;
            
        case 2:
            header("Location: index.php?c=magia_table_lines&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=magia_table_lines&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=magia_table_lines&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=magia_table_lines&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


