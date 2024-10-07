<?php 
###################################################### 
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
# Fecha de creacion del documento: 2024-08-24 16:08:24 
######################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$mg_form_id = (isset($_POST["mg_form_id"]) && $_POST["mg_form_id"] !=""  && $_POST["mg_form_id"] !="null" ) ? clean($_POST["mg_form_id"]) :  null  ;
$mg_type = (isset($_POST["mg_type"]) && $_POST["mg_type"] !=""  && $_POST["mg_type"] !="null" ) ? clean($_POST["mg_type"]) :  null  ;
$mg_external_table = (isset($_POST["mg_external_table"]) && $_POST["mg_external_table"] !=""  && $_POST["mg_external_table"] !="null" ) ? clean($_POST["mg_external_table"]) :  null  ;
$mg_external_col = (isset($_POST["mg_external_col"]) && $_POST["mg_external_col"] !=""  && $_POST["mg_external_col"] !="null" ) ? clean($_POST["mg_external_col"]) :  null  ;
$mg_label = (isset($_POST["mg_label"]) && $_POST["mg_label"] !=""  && $_POST["mg_label"] !="null" ) ? clean($_POST["mg_label"]) :  null  ;
$mg_help_text = (isset($_POST["mg_help_text"]) && $_POST["mg_help_text"] !=""  && $_POST["mg_help_text"] !="null" ) ? clean($_POST["mg_help_text"]) :  null  ;
$mg_name = (isset($_POST["mg_name"]) && $_POST["mg_name"] !=""  && $_POST["mg_name"] !="null" ) ? clean($_POST["mg_name"]) :  null  ;
$mg_id = (isset($_POST["mg_id"]) && $_POST["mg_id"] !=""  && $_POST["mg_id"] !="null" ) ? clean($_POST["mg_id"]) :  null  ;
$mg_placeholder = (isset($_POST["mg_placeholder"]) && $_POST["mg_placeholder"] !=""  && $_POST["mg_placeholder"] !="null" ) ? clean($_POST["mg_placeholder"]) :  null  ;
$mg_value = (isset($_POST["mg_value"]) && $_POST["mg_value"] !=""  && $_POST["mg_value"] !="null" ) ? clean($_POST["mg_value"]) :  null  ;
$mg_class = (isset($_POST["mg_class"]) && $_POST["mg_class"] !=""  && $_POST["mg_class"] !="null" ) ? clean($_POST["mg_class"]) :  null  ;
$mg_required = (isset($_POST["mg_required"]) && $_POST["mg_required"] !="" ) ? clean($_POST["mg_required"]) :  null  ;
$mg_disabled = (isset($_POST["mg_disabled"]) && $_POST["mg_disabled"] !="" ) ? clean($_POST["mg_disabled"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
################################################################################
# REQUIRED
################################################################################
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

###############################################################################
# FORMAT
###############################################################################
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

###############################################################################
# CONDITIONAL
################################################################################
  
//if( magia_forms_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = magia_forms_lines_add(
        $mg_form_id ,  $mg_type ,  $mg_external_table ,  $mg_external_col ,  $mg_label ,  $mg_help_text ,  $mg_name ,  $mg_id ,  $mg_placeholder ,  $mg_value ,  $mg_class ,  $mg_required ,  $mg_disabled ,  $order_by ,  $status    
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
            // ejemplo index.php?c=magia_forms_lines&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


