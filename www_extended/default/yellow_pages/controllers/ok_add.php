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
# Fecha de creacion del documento: 2024-08-30 21:08:10 
#################################################################################
# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");

    # y matamos el proceso 
    die("Error has permission ");
}

$label = (isset($_POST["label"]) && $_POST["label"] != "" && $_POST["label"] != "null" ) ? clean($_POST["label"]) : null;
$url = (isset($_POST["url"]) && $_POST["url"] != "" && $_POST["url"] != "null" ) ? clean($_POST["url"]) : null;
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? clean($_POST["description"]) : null;
$category = (isset($_POST["category"]) && $_POST["category"] != "" && $_POST["category"] != "null" ) ? clean($_POST["category"]) : null;
$target = (isset($_POST["target"]) && $_POST["target"] != "" ) ? clean($_POST["target"]) : _new;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
#################################################################################
# REQUIRED
#################################################################################

if (!$label) {
    array_push($error, 'Label is mandatory');
}
if (!$url) {
    array_push($error, 'Url is mandatory');
}
if (!$category) {
    array_push($error, 'Category is mandatory');
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

if (!yellow_pages_is_label($label)) {
    array_push($error, 'Label format error');
}
if (!yellow_pages_is_url($url)) {
    array_push($error, 'Url format error');
}
if (!yellow_pages_is_category($category)) {
    array_push($error, 'Category format error');
}
if (!yellow_pages_is_order_by($order_by)) {
    array_push($error, 'Order by format error');
}
if (!yellow_pages_is_status($status)) {
    array_push($error, 'Status format error');
}

#################################################################################
# CONDITIONAL
#################################################################################
//if( yellow_pages_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
#################################################################################
#################################################################################
#################################################################################
#################################################################################

if (!$error) {
    $lastInsertId = yellow_pages_add(
            $label, $url, $description, $category, $target, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=yellow_pages");
            break;

        case 2:
            header("Location: index.php?c=yellow_pages&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=yellow_pages&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=yellow_pages&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=yellow_pages&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


