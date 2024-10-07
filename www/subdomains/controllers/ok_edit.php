<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$contact_id = (isset($_REQUEST["contact_id"]) && $_REQUEST["contact_id"] != "") ? clean($_REQUEST["contact_id"]) : false;
$create_by = (isset($_REQUEST["create_by"]) && $_REQUEST["create_by"] != "") ? clean($_REQUEST["create_by"]) : false;
$plan = (isset($_REQUEST["plan"]) && $_REQUEST["plan"] != "") ? clean($_REQUEST["plan"]) : false;
$prefix = (isset($_REQUEST["prefix"]) && $_REQUEST["prefix"] != "") ? clean($_REQUEST["prefix"]) : false;
$subdomain = (isset($_REQUEST["subdomain"]) && $_REQUEST["subdomain"] != "") ? clean($_REQUEST["subdomain"]) : false;
$domain = (isset($_REQUEST["domain"]) && $_REQUEST["domain"] != "") ? clean($_REQUEST["domain"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$date_registre = (isset($_REQUEST["date_registre"]) && $_REQUEST["date_registre"] != "") ? clean($_REQUEST["date_registre"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$contact_id) {
    array_push($error, 'Contact_id is mandatory');
}
if (!$prefix) {
    array_push($error, 'Prefix is mandatory');
}
if (!$subdomain) {
    array_push($error, 'Subdomain is mandatory');
}
if (!$domain) {
    array_push($error, 'Domain is mandatory');
}
if (!$code) {
    array_push($error, 'Code is mandatory');
}
if (!$date_registre) {
    array_push($error, 'Date_registre is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!subdomains_is_contact_id($contact_id)) {
    array_push($error, 'Contact_id format error');
}
if (!subdomains_is_prefix($prefix)) {
    array_push($error, 'Prefix format error');
}
if (!subdomains_is_subdomain($subdomain)) {
    array_push($error, 'Subdomain format error');
}
if (!subdomains_is_domain($domain)) {
    array_push($error, 'Domain format error');
}
if (!subdomains_is_code($code)) {
    array_push($error, 'Code format error');
}
if (!subdomains_is_date_registre($date_registre)) {
    array_push($error, 'Date_registre format error');
}
if (!subdomains_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!subdomains_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (subdomains_search_by_unique("id", "subdomain", $subdomain)) {
    array_push($error, 'Subdomain already exists in data base');
}


if (subdomains_search_by_unique("id", "code", $code)) {
    array_push($error, 'Code already exists in data base');
}


//if( subdomains_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    subdomains_edit(
            $id, $contact_id, $create_by, $plan, $prefix, $subdomain, $domain, $code, $date_registre, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=subdomains");
            break;

        case 2:
            header("Location: index.php?c=subdomains&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=subdomains&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=subdomains&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=subdomains&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
