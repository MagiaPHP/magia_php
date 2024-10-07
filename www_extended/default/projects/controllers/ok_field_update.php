<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"]) && $_POST["id"] != "" && $_POST["id"] != "null" ) ? clean($_POST["id"]) : null;
$field = (isset($_POST["field"]) && $_POST["field"] != "" && $_POST["field"] != "null" ) ? clean($_POST["field"]) : null;
$new_data = (isset($_POST["new_data"]) && $_POST["new_data"] != "" && $_POST["new_data"] != "null" ) ? clean($_POST["new_data"]) : null;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'Id is mandatory');
}
if (!$field) {
    array_push($error, 'Field is mandatory');
}
if (!$new_data) {
    array_push($error, 'New data is mandatory');
}
###############################################################################
# FORMAT
###############################################################################
if ($field == 'id' && !projects_is_id($field)) {
    array_push($error, 'Id format error');
}
if ($field == 'contact_id' && !projects_is_contact_id($field)) {
    array_push($error, 'Contact_id format error');
}
if ($field == 'name' && !projects_is_name($name)) {
    array_push($error, 'Name format error');
}
if ($field == 'description' && !projects_is_description($field)) {
    array_push($error, 'Description format error');
}
if ($field == 'address' && !projects_is_address($field)) {
    array_push($error, 'Address format error');
}
if ($field == 'date_start' && !projects_is_date_start($field)) {
    array_push($error, 'Date_start format error');
}
if ($field == 'date_end' && !projects_is_date_end($field)) {
    array_push($error, 'Date_end format error');
}
if ($field == 'order_by' && !projects_is_order_by($field)) {
    array_push($error, 'Order_by format error');
}
if ($field == 'status' && !projects_is_status($field)) {
    array_push($error, 'Status format error');
}
###############################################################################
# CONDITIONAL
################################################################################
//if( projects_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################


$pro = new Projects_e();
$pro->setProjects($id);
vardump($pro);

$pro->update_date_start($new_data);

vardump($pro);

die();

if (!$error) {

    projects_update_date_start($id, $new_data);
//    
//    $lastInsertId = projects_add(
//            $contact_id, $name, $description, $address, $date_start, $date_end, $order_by, $status
//    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=projects");
            break;

        case 2:
            header("Location: index.php?c=projects&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=projects&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=projects&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=projects&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


