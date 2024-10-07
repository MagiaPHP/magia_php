<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"]) && $_POST["id"] != "" && $_POST["id"] != "null" ) ? clean($_POST["id"]) : null;
//$field = (isset($_POST["field"]) && $_POST["field"] != "" && $_POST["field"] != "null" ) ? clean($_POST["field"]) : null;
$value_round = (isset($_POST["value_round"]) && $_POST["value_round"] != "" && $_POST["value_round"] != "null" ) ? clean($_POST["value_round"]) : null;
//
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
//
$error = array();

################################################################################
################################################################################
# REQUIRED
if (!$id) {
    array_push($error, 'Id is mandatory');
}
//if (!$value_round) {
//    array_push($error, 'Value round is mandatory');
//}
################################################################################
###############################################################################
# FORMAT
if (!hr_payroll_is_value_round($value_round)) {
    array_push($error, 'Value round format error');
}
if (!$value_round) {
    $value_round = 0;
}
###############################################################################
###############################################################################
# CONDITIONAL
################################################################################
//if( hr_payroll_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################


if (!$error) {

    hr_payroll_update_value_round($id, $value_round);

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_payroll");
            break;

        case 2:
            header("Location: index.php?c=hr_payroll&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_payroll&a=by_month");
            break;

        case 4:
            header("Location: index.php?c=hr_payroll&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_payroll&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


