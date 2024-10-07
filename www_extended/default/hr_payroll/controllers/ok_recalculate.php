<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : false;

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
    $hr_payroll->setLines();

    for ($i = 0; $i <= 50; $i++) {
        foreach ($hr_payroll->getLines() as $key => $line) {
            
            
            if ($line['formula']) {
                $new_data = $hr_payroll->calculate_formule($line['formula']) ?? 0;
                hr_payroll_lines_update_value($line['id'], $new_data);
            }
            
            
        }

        // Tambien debo pone al dia el total a pagar en hr_payroll
        $total_to_pay = hr_payroll_lines_field_by_payroll_id_code('value', $id, '7001');

        hr_payroll_update_to_pay($id, $total_to_pay);
    }

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=hr_payroll&a=details&id=$id");
            break;

        case 2:
            break;

        default:
            header("Location: index.php?c=hr_payroll&a=details&id=$id");

            break;
    }
} else {
    include view("home", "pageError");
}    

