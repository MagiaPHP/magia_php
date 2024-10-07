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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$table_id = (isset($_REQUEST["table_id"]) && $_REQUEST["table_id"] !="") ? clean($_REQUEST["table_id"]) : false;
$header_icon = (isset($_REQUEST["header_icon"]) && $_REQUEST["header_icon"] !="") ? clean($_REQUEST["header_icon"]) : false;
$header_pre_label = (isset($_REQUEST["header_pre_label"]) && $_REQUEST["header_pre_label"] !="") ? clean($_REQUEST["header_pre_label"]) : false;
$header_label = (isset($_REQUEST["header_label"]) && $_REQUEST["header_label"] !="") ? clean($_REQUEST["header_label"]) : false;
$header_url = (isset($_REQUEST["header_url"]) && $_REQUEST["header_url"] !="") ? clean($_REQUEST["header_url"]) : false;
$header_post_label = (isset($_REQUEST["header_post_label"]) && $_REQUEST["header_post_label"] !="") ? clean($_REQUEST["header_post_label"]) : false;
$body_icon = (isset($_REQUEST["body_icon"]) && $_REQUEST["body_icon"] !="") ? clean($_REQUEST["body_icon"]) : false;
$body_pre_label = (isset($_REQUEST["body_pre_label"]) && $_REQUEST["body_pre_label"] !="") ? clean($_REQUEST["body_pre_label"]) : false;
$body_label = (isset($_REQUEST["body_label"]) && $_REQUEST["body_label"] !="") ? clean($_REQUEST["body_label"]) : false;
$body_post_label = (isset($_REQUEST["body_post_label"]) && $_REQUEST["body_post_label"] !="") ? clean($_REQUEST["body_post_label"]) : false;
$footer_icon = (isset($_REQUEST["footer_icon"]) && $_REQUEST["footer_icon"] !="") ? clean($_REQUEST["footer_icon"]) : false;
$footer_pre_label = (isset($_REQUEST["footer_pre_label"]) && $_REQUEST["footer_pre_label"] !="") ? clean($_REQUEST["footer_pre_label"]) : false;
$footer_label = (isset($_REQUEST["footer_label"]) && $_REQUEST["footer_label"] !="") ? clean($_REQUEST["footer_label"]) : false;
$footer_post_label = (isset($_REQUEST["footer_post_label"]) && $_REQUEST["footer_post_label"] !="") ? clean($_REQUEST["footer_post_label"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] !="") ? clean($_REQUEST["description"]) : false;
$permission = (isset($_REQUEST["permission"]) && $_REQUEST["permission"] !="") ? clean($_REQUEST["permission"]) : 0000;
$align = (isset($_REQUEST["align"]) && $_REQUEST["align"] !="") ? clean($_REQUEST["align"]) : L;
$show = (isset($_REQUEST["show"]) && $_REQUEST["show"] !="") ? clean($_REQUEST["show"]) : 1;
$translate = (isset($_REQUEST["translate"]) && $_REQUEST["translate"] !="") ? clean($_REQUEST["translate"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : 1;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
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

if (! $error ) {
    
    magia_table_lines_edit(
        $id ,  $table_id ,  $header_icon ,  $header_pre_label ,  $header_label ,  $header_url ,  $header_post_label ,  $body_icon ,  $body_pre_label ,  $body_label ,  $body_post_label ,  $footer_icon ,  $footer_pre_label ,  $footer_label ,  $footer_post_label ,  $description ,  $permission ,  $align ,  $show ,  $translate ,  $order_by ,  $status    
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
            // ejemplo index.php?c=magia_table_lines&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
