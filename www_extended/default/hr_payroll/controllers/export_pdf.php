<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$cell_selected = (isset($_REQUEST["cell_selected"])) ? clean($_REQUEST["cell_selected"]) : false;

$lang = (isset($_REQUEST["lang"]) && $_REQUEST["lang"] != "" ) ? clean($_REQUEST["lang"]) : 'en_GB';
$way = (isset($_REQUEST["way"]) && $_REQUEST["way"] != "" ) ? clean($_REQUEST["way"]) : 'web';

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "Id is mandatory");
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
if (!hr_payroll_field_id("id", $id)) {
    array_push($error, "Id is mandatory");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $hr_payroll = new Payroll();
    
    $hr_payroll->setPayroll($id);

    include view("hr_payroll", "export_pdf");
} else {
    include view("home", "pageError");
}    

