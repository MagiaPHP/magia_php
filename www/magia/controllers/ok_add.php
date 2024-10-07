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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$form_id = (isset($_POST["form_id"]) && $_POST["form_id"] !=""  && $_POST["form_id"] !="null" ) ? clean($_POST["form_id"]) :  null  ;
$m_db = (isset($_POST["m_db"]) && $_POST["m_db"] !=""  && $_POST["m_db"] !="null" ) ? clean($_POST["m_db"]) :  null  ;
$m_table = (isset($_POST["m_table"]) && $_POST["m_table"] !=""  && $_POST["m_table"] !="null" ) ? clean($_POST["m_table"]) :  null  ;
$m_field_name = (isset($_POST["m_field_name"]) && $_POST["m_field_name"] !=""  && $_POST["m_field_name"] !="null" ) ? clean($_POST["m_field_name"]) :  null  ;
$m_action = (isset($_POST["m_action"]) && $_POST["m_action"] !=""  && $_POST["m_action"] !="null" ) ? clean($_POST["m_action"]) :  null  ;
$m_label = (isset($_POST["m_label"]) && $_POST["m_label"] !=""  && $_POST["m_label"] !="null" ) ? clean($_POST["m_label"]) :  null  ;
$m_type = (isset($_POST["m_type"]) && $_POST["m_type"] !=""  && $_POST["m_type"] !="null" ) ? clean($_POST["m_type"]) :  null  ;
$m_class = (isset($_POST["m_class"]) && $_POST["m_class"] !="" ) ? clean($_POST["m_class"]) : form-control ;
$m_table_external = (isset($_POST["m_table_external"]) && $_POST["m_table_external"] !=""  && $_POST["m_table_external"] !="null" ) ? clean($_POST["m_table_external"]) :  null  ;
$m_col_external = (isset($_POST["m_col_external"]) && $_POST["m_col_external"] !=""  && $_POST["m_col_external"] !="null" ) ? clean($_POST["m_col_external"]) :  null  ;
$m_name = (isset($_POST["m_name"]) && $_POST["m_name"] !=""  && $_POST["m_name"] !="null" ) ? clean($_POST["m_name"]) :  null  ;
$m_id = (isset($_POST["m_id"]) && $_POST["m_id"] !=""  && $_POST["m_id"] !="null" ) ? clean($_POST["m_id"]) :  null  ;
$m_placeholder = (isset($_POST["m_placeholder"]) && $_POST["m_placeholder"] !=""  && $_POST["m_placeholder"] !="null" ) ? clean($_POST["m_placeholder"]) :  null  ;
$m_value = (isset($_POST["m_value"]) && $_POST["m_value"] !=""  && $_POST["m_value"] !="null" ) ? clean($_POST["m_value"]) :  null  ;
$m_only_read = (isset($_POST["m_only_read"]) && $_POST["m_only_read"] !=""  && $_POST["m_only_read"] !="null" ) ? clean($_POST["m_only_read"]) :  null  ;
$m_mandatory = (isset($_POST["m_mandatory"]) && $_POST["m_mandatory"] !=""  && $_POST["m_mandatory"] !="null" ) ? clean($_POST["m_mandatory"]) :  null  ;
$m_selected = (isset($_POST["m_selected"]) && $_POST["m_selected"] !=""  && $_POST["m_selected"] !="null" ) ? clean($_POST["m_selected"]) :  null  ;
$m_disabled = (isset($_POST["m_disabled"]) && $_POST["m_disabled"] !=""  && $_POST["m_disabled"] !="null" ) ? clean($_POST["m_disabled"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !=""  && $_POST["order_by"] !="null" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !=""  && $_POST["status"] !="null" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
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

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = magia_add(
        $form_id ,  $m_db ,  $m_table ,  $m_field_name ,  $m_action ,  $m_label ,  $m_type ,  $m_class ,  $m_table_external ,  $m_col_external ,  $m_name ,  $m_id ,  $m_placeholder ,  $m_value ,  $m_only_read ,  $m_mandatory ,  $m_selected ,  $m_disabled ,  $order_by ,  $status    
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
            // ejemplo index.php?c=magia&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


