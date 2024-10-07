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
# Fecha de creacion del documento: 2024-08-31 17:08:35 
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
$mg_form_id = (isset($_REQUEST["mg_form_id"]) && $_REQUEST["mg_form_id"] !="") ? clean($_REQUEST["mg_form_id"]) : false;
$mg_type = (isset($_REQUEST["mg_type"]) && $_REQUEST["mg_type"] !="") ? clean($_REQUEST["mg_type"]) : false;
$mg_external_table = (isset($_REQUEST["mg_external_table"]) && $_REQUEST["mg_external_table"] !="") ? clean($_REQUEST["mg_external_table"]) : false;
$mg_external_col = (isset($_REQUEST["mg_external_col"]) && $_REQUEST["mg_external_col"] !="") ? clean($_REQUEST["mg_external_col"]) : false;
$mg_label = (isset($_REQUEST["mg_label"]) && $_REQUEST["mg_label"] !="") ? clean($_REQUEST["mg_label"]) : false;
$mg_help_text = (isset($_REQUEST["mg_help_text"]) && $_REQUEST["mg_help_text"] !="") ? clean($_REQUEST["mg_help_text"]) : false;
$mg_name = (isset($_REQUEST["mg_name"]) && $_REQUEST["mg_name"] !="") ? clean($_REQUEST["mg_name"]) : false;
$mg_id = (isset($_REQUEST["mg_id"]) && $_REQUEST["mg_id"] !="") ? clean($_REQUEST["mg_id"]) : false;
$mg_placeholder = (isset($_REQUEST["mg_placeholder"]) && $_REQUEST["mg_placeholder"] !="") ? clean($_REQUEST["mg_placeholder"]) : false;
$mg_value = (isset($_REQUEST["mg_value"]) && $_REQUEST["mg_value"] !="") ? clean($_REQUEST["mg_value"]) : false;
$mg_class = (isset($_REQUEST["mg_class"]) && $_REQUEST["mg_class"] !="") ? clean($_REQUEST["mg_class"]) : false;
$mg_required = (isset($_REQUEST["mg_required"]) && $_REQUEST["mg_required"] !="") ? clean($_REQUEST["mg_required"]) : false;
$mg_disabled = (isset($_REQUEST["mg_disabled"]) && $_REQUEST["mg_disabled"] !="") ? clean($_REQUEST["mg_disabled"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : 1;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$mg_form_id) {
    array_push($error, 'Mg form id is mandatory');
}
if (!$mg_type) {
    array_push($error, 'Mg type is mandatory');
}
if (!$mg_label) {
    array_push($error, 'Mg label is mandatory');
}
if (!$mg_name) {
    array_push($error, 'Mg name is mandatory');
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

if (! magia_forms_lines_is_mg_form_id($mg_form_id) ) {
    array_push($error, 'Mg form id format error');
}
if (! magia_forms_lines_is_mg_type($mg_type) ) {
    array_push($error, 'Mg type format error');
}
if (! magia_forms_lines_is_mg_label($mg_label) ) {
    array_push($error, 'Mg label format error');
}
if (! magia_forms_lines_is_mg_name($mg_name) ) {
    array_push($error, 'Mg name format error');
}
if (! magia_forms_lines_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! magia_forms_lines_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( magia_forms_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    magia_forms_lines_edit(
        $id ,  $mg_form_id ,  $mg_type ,  $mg_external_table ,  $mg_external_col ,  $mg_label ,  $mg_help_text ,  $mg_name ,  $mg_id ,  $mg_placeholder ,  $mg_value ,  $mg_class ,  $mg_required ,  $mg_disabled ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=magia_forms_lines");
            break;
            
        case 2:
            header("Location: index.php?c=magia_forms_lines&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=magia_forms_lines&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=magia_forms_lines&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=magia_forms_lines&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
