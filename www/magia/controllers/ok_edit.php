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
# Fecha de creacion del documento: 2024-08-31 17:08:46 
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
$form_id = (isset($_REQUEST["form_id"]) && $_REQUEST["form_id"] !="") ? clean($_REQUEST["form_id"]) : false;
$m_db = (isset($_REQUEST["m_db"]) && $_REQUEST["m_db"] !="") ? clean($_REQUEST["m_db"]) : false;
$m_table = (isset($_REQUEST["m_table"]) && $_REQUEST["m_table"] !="") ? clean($_REQUEST["m_table"]) : false;
$m_field_name = (isset($_REQUEST["m_field_name"]) && $_REQUEST["m_field_name"] !="") ? clean($_REQUEST["m_field_name"]) : false;
$m_action = (isset($_REQUEST["m_action"]) && $_REQUEST["m_action"] !="") ? clean($_REQUEST["m_action"]) : false;
$m_label = (isset($_REQUEST["m_label"]) && $_REQUEST["m_label"] !="") ? clean($_REQUEST["m_label"]) : false;
$m_type = (isset($_REQUEST["m_type"]) && $_REQUEST["m_type"] !="") ? clean($_REQUEST["m_type"]) : false;
$m_class = (isset($_REQUEST["m_class"]) && $_REQUEST["m_class"] !="") ? clean($_REQUEST["m_class"]) : form-control;
$m_table_external = (isset($_REQUEST["m_table_external"]) && $_REQUEST["m_table_external"] !="") ? clean($_REQUEST["m_table_external"]) : false;
$m_col_external = (isset($_REQUEST["m_col_external"]) && $_REQUEST["m_col_external"] !="") ? clean($_REQUEST["m_col_external"]) : false;
$m_name = (isset($_REQUEST["m_name"]) && $_REQUEST["m_name"] !="") ? clean($_REQUEST["m_name"]) : false;
$m_id = (isset($_REQUEST["m_id"]) && $_REQUEST["m_id"] !="") ? clean($_REQUEST["m_id"]) : false;
$m_placeholder = (isset($_REQUEST["m_placeholder"]) && $_REQUEST["m_placeholder"] !="") ? clean($_REQUEST["m_placeholder"]) : false;
$m_value = (isset($_REQUEST["m_value"]) && $_REQUEST["m_value"] !="") ? clean($_REQUEST["m_value"]) : false;
$m_only_read = (isset($_REQUEST["m_only_read"]) && $_REQUEST["m_only_read"] !="") ? clean($_REQUEST["m_only_read"]) : false;
$m_mandatory = (isset($_REQUEST["m_mandatory"]) && $_REQUEST["m_mandatory"] !="") ? clean($_REQUEST["m_mandatory"]) : false;
$m_selected = (isset($_REQUEST["m_selected"]) && $_REQUEST["m_selected"] !="") ? clean($_REQUEST["m_selected"]) : false;
$m_disabled = (isset($_REQUEST["m_disabled"]) && $_REQUEST["m_disabled"] !="") ? clean($_REQUEST["m_disabled"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$m_db) {
    array_push($error, 'M db is mandatory');
}
if (!$m_table) {
    array_push($error, 'M table is mandatory');
}
if (!$m_field_name) {
    array_push($error, 'M field name is mandatory');
}
if (!$m_action) {
    array_push($error, 'M action is mandatory');
}
if (!$m_label) {
    array_push($error, 'M label is mandatory');
}
if (!$m_type) {
    array_push($error, 'M type is mandatory');
}
if (!$m_class) {
    array_push($error, 'M class is mandatory');
}
if (!$m_table_external) {
    array_push($error, 'M table external is mandatory');
}
if (!$m_col_external) {
    array_push($error, 'M col external is mandatory');
}
if (!$m_name) {
    array_push($error, 'M name is mandatory');
}
if (!$m_id) {
    array_push($error, 'M id is mandatory');
}
if (!$m_placeholder) {
    array_push($error, 'M placeholder is mandatory');
}
if (!$m_value) {
    array_push($error, 'M value is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! magia_is_m_db($m_db) ) {
    array_push($error, 'M db format error');
}
if (! magia_is_m_table($m_table) ) {
    array_push($error, 'M table format error');
}
if (! magia_is_m_field_name($m_field_name) ) {
    array_push($error, 'M field name format error');
}
if (! magia_is_m_action($m_action) ) {
    array_push($error, 'M action format error');
}
if (! magia_is_m_label($m_label) ) {
    array_push($error, 'M label format error');
}
if (! magia_is_m_type($m_type) ) {
    array_push($error, 'M type format error');
}
if (! magia_is_m_class($m_class) ) {
    array_push($error, 'M class format error');
}
if (! magia_is_m_table_external($m_table_external) ) {
    array_push($error, 'M table external format error');
}
if (! magia_is_m_col_external($m_col_external) ) {
    array_push($error, 'M col external format error');
}
if (! magia_is_m_name($m_name) ) {
    array_push($error, 'M name format error');
}
if (! magia_is_m_id($m_id) ) {
    array_push($error, 'M id format error');
}
if (! magia_is_m_placeholder($m_placeholder) ) {
    array_push($error, 'M placeholder format error');
}
if (! magia_is_m_value($m_value) ) {
    array_push($error, 'M value format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( magia_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    magia_edit(
        $id ,  $form_id ,  $m_db ,  $m_table ,  $m_field_name ,  $m_action ,  $m_label ,  $m_type ,  $m_class ,  $m_table_external ,  $m_col_external ,  $m_name ,  $m_id ,  $m_placeholder ,  $m_value ,  $m_only_read ,  $m_mandatory ,  $m_selected ,  $m_disabled ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=magia");
            break;
            
        case 2:
            header("Location: index.php?c=magia&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=magia&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=magia&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=magia&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
