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
# Fecha de creacion del documento: 2024-09-04 08:09:56 
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
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$params = (isset($_POST["params"]) && $_POST["params"] !=""  && $_POST["params"] !="null" ) ? clean($_POST["params"]) :  null  ;
$author = (isset($_POST["author"]) && $_POST["author"] !=""  && $_POST["author"] !="null" ) ? clean($_POST["author"]) :  null  ;
$author_email = (isset($_POST["author_email"]) && $_POST["author_email"] !=""  && $_POST["author_email"] !="null" ) ? clean($_POST["author_email"]) :  null  ;
$url = (isset($_POST["url"]) && $_POST["url"] !=""  && $_POST["url"] !="null" ) ? clean($_POST["url"]) :  null  ;
$version = (isset($_POST["version"]) && $_POST["version"] !=""  && $_POST["version"] !="null" ) ? clean($_POST["version"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$name) {
    array_push($error, 'Name is mandatory');
}
if (!$description) {
    array_push($error, 'Description is mandatory');
}
if (!$author_email) {
    array_push($error, 'Author email is mandatory');
}
if (!$url) {
    array_push($error, 'Url is mandatory');
}
if (!$version) {
    array_push($error, 'Version is mandatory');
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

if (! doc_models_is_name($name) ) {
    array_push($error, 'Name format error');
}
if (! doc_models_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! doc_models_is_author_email($author_email) ) {
    array_push($error, 'Author email format error');
}
if (! doc_models_is_url($url) ) {
    array_push($error, 'Url format error');
}
if (! doc_models_is_version($version) ) {
    array_push($error, 'Version format error');
}
if (! doc_models_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! doc_models_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( doc_models_search_by_unique("id","name", $name)){
    array_push($error, 'Name already exists in data base');
}

  
//if( doc_models_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    doc_models_edit(
        $id ,  $name ,  $description ,  $params ,  $author ,  $author_email ,  $url ,  $version ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=doc_models");
            break;
            
        case 2:
            header("Location: index.php?c=doc_models&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=doc_models&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=doc_models&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=doc_models&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
