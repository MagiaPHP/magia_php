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
# Fecha de creacion del documento: 2024-09-04 08:09:01 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$modele = (isset($_POST["modele"]) && $_POST["modele"] !=""  && $_POST["modele"] !="null" ) ? clean($_POST["modele"]) :  null  ;
$doc = (isset($_POST["doc"]) && $_POST["doc"] !=""  && $_POST["doc"] !="null" ) ? clean($_POST["doc"]) :  null  ;
$section = (isset($_POST["section"]) && $_POST["section"] !=""  && $_POST["section"] !="null" ) ? clean($_POST["section"]) :  null  ;
$element = (isset($_POST["element"]) && $_POST["element"] !=""  && $_POST["element"] !="null" ) ? clean($_POST["element"]) :  null  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$params = (isset($_POST["params"]) && $_POST["params"] !=""  && $_POST["params"] !="null" ) ? clean($_POST["params"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$modele) {                        
    array_push($error, 'Modele is mandatory');
}
if (!$element) {                        
    array_push($error, 'Element is mandatory');
}
if (!$name) {                        
    array_push($error, 'Name is mandatory');
}
if (!$params) {                        
    array_push($error, 'Params is mandatory');
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

if (! doc_models_lines_is_modele($modele) ) {
    array_push($error, 'Modele format error');
}
if (! doc_models_lines_is_element($element) ) {
    array_push($error, 'Element format error');
}
if (! doc_models_lines_is_name($name) ) {
    array_push($error, 'Name format error');
}
if (! doc_models_lines_is_params($params) ) {
    array_push($error, 'Params format error');
}
if (! doc_models_lines_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! doc_models_lines_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( doc_models_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = doc_models_lines_add(
        $modele ,  $doc ,  $section ,  $element ,  $name ,  $params ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=doc_models_lines");
            break;
            
        case 2:
            header("Location: index.php?c=doc_models_lines&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=doc_models_lines&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=doc_models_lines&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=doc_models_lines&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


