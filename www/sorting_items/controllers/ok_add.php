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
# Fecha de creacion del documento: 2024-08-30 13:08:28 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$title = (isset($_POST["title"]) && $_POST["title"] !=""  && $_POST["title"] !="null" ) ? clean($_POST["title"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$position_order = (isset($_POST["position_order"]) && $_POST["position_order"] !=""  && $_POST["position_order"] !="null" ) ? clean($_POST["position_order"]) :  null  ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$title) {                        
    array_push($error, 'Title is mandatory');
}
if (!$description) {                        
    array_push($error, 'Description is mandatory');
}
if (!$position_order) {                        
    array_push($error, 'Position order is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! sorting_items_is_title($title) ) {
    array_push($error, 'Title format error');
}
if (! sorting_items_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! sorting_items_is_position_order($position_order) ) {
    array_push($error, 'Position order format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( sorting_items_search($position_order)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = sorting_items_add(
        $title ,  $description ,  $position_order    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=sorting_items");
            break;
            
        case 2:
            header("Location: index.php?c=sorting_items&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=sorting_items&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=sorting_items&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=sorting_items&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


