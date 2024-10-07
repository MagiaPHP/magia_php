<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "" && $_POST["contact_id"] != "null" ) ? clean($_POST["contact_id"]) : null;
$create_by = (isset($_POST["create_by"]) && $_POST["create_by"] != "" && $_POST["create_by"] != "null" ) ? clean($_POST["create_by"]) : null;
$plan = (isset($_POST["plan"]) && $_POST["plan"] != "" && $_POST["plan"] != "null" ) ? clean($_POST["plan"]) : null;
$prefix = (isset($_POST["prefix"]) && $_POST["prefix"] != "" && $_POST["prefix"] != "null" ) ? clean($_POST["prefix"]) : null;
$subdomain = (isset($_POST["subdomain"]) && $_POST["subdomain"] != "" && $_POST["subdomain"] != "null" ) ? clean($_POST["subdomain"]) : null;
$domain = (isset($_POST["domain"]) && $_POST["domain"] != "" && $_POST["domain"] != "null" ) ? clean($_POST["domain"]) : null;
$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : null;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != "" ) ? clean($_POST["date_registre"]) : date('Y-m-d G:i:s');
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = subdomains_add(
            $contact_id, $create_by, $plan, $prefix, $subdomain, $domain, $code, $date_registre, $order_by, $status
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
            // ejemplo index.php?c=subdomains&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


