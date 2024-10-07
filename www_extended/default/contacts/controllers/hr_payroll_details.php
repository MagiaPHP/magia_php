<?php

die();
// debe ir al modulo hr_payroll

/**
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// contacto
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
// payrol
$payroll_id = (isset($_REQUEST["payroll_id"]) && $_REQUEST["payroll_id"] != "" ) ? clean($_REQUEST["payroll_id"]) : false;
//
$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "Id is mandatory");
}
if (!$payroll_id) {
    array_push($error, "Payroll id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (!hr_payroll_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!hr_payroll_field_id("id", $payroll_id)) {
    array_push($error, "Id is mandatory");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $hr_payroll = new Hr_payroll();
    $hr_payroll->setHr_payroll($payroll_id);

    include view("contacts", "page_hr_payroll_details");
} else {
    include view("home", "pageError");
}    
 * 
 */

