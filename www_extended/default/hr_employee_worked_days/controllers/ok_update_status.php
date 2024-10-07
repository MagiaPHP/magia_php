<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$ids = (isset($_REQUEST["ids"]) && $_REQUEST["ids"] != "") ? ($_REQUEST["ids"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;

$error = array();

foreach ($ids as $key => $id) {
    ################################################################################
    # REQUIRED
    ################################################################################
    if (!$id) {
        array_push($error, 'Id is mandatory');
    }
    if (!$status) {
        array_push($error, 'Status is mandatory');
    }
    ###############################################################################
    # FORMAT
    ###############################################################################
    if (!hr_employee_worked_days_is_id($id)) {
        array_push($error, 'Id format error');
    }
    if (!hr_worked_days_status_is_code($status)) {
        array_push($error, 'Status format error');
    }
    ###############################################################################
    # CONDITIONAL
    ################################################################################
    ################################################################################
    # MAKE UPDATE
    hr_employee_worked_days_update_status($id, $status);
    ################################################################################
    ################################################################################
}




if (!$error) {

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_work_status");
            break;

        case 2:
            header("Location: index.php?c=hr_employee_work_status&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_employee_work_status&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_employee_work_status&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_employee_work_status&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
