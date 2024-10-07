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
# Fecha de creacion del documento: 2024-09-16 12:09:32 
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
$template = (isset($_POST["template"]) && $_POST["template"] !=""  && $_POST["template"] !="null" ) ? clean($_POST["template"]) :  null  ;
$label = (isset($_POST["label"]) && $_POST["label"] !=""  && $_POST["label"] !="null" ) ? clean($_POST["label"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$icon = (isset($_POST["icon"]) && $_POST["icon"] !=""  && $_POST["icon"] !="null" ) ? clean($_POST["icon"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$template) {
    array_push($error, 'Template is mandatory');
}
if (!$label) {
    array_push($error, 'Label is mandatory');
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

if (! banks_templates_is_template($template) ) {
    array_push($error, 'Template format error');
}
if (! banks_templates_is_label($label) ) {
    array_push($error, 'Label format error');
}
if (! banks_templates_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! banks_templates_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( banks_templates_search_by_unique("id","template", $template)){
    array_push($error, 'Template already exists in data base');
}

  
//if( banks_templates_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    banks_templates_edit(
        $id ,  $template ,  $label ,  $description ,  $icon ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=banks_templates");
            break;
            
        case 2:
            header("Location: index.php?c=banks_templates&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=banks_templates&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=banks_templates&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=banks_templates&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
