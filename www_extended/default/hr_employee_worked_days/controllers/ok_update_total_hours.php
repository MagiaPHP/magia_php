<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$ids = (isset($_REQUEST["ids"]) && $_REQUEST["ids"] != "") ? ($_REQUEST["ids"]) : false;
$date = (isset($_REQUEST["date"]) && $_REQUEST["date"] != "") ? clean($_REQUEST["date"]) : false;
$project_id = (isset($_REQUEST["project_id"]) && $_REQUEST["project_id"] != "") ? clean($_REQUEST["project_id"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();


foreach ($ids as $id => $value) {
    $total_hours = $value['total_hours'];
    //vardump(array($id, $total_hours)); 
    ################################################################################
    # REQUIRED
    ################################################################################
    if (!$id) {
        array_push($error, 'Id is mandatory');
    }
    if (!$total_hours) {
        array_push($error, 'Total hours is mandatory');
    }
    ###############################################################################
    # FORMAT
    ###############################################################################
    if (!hr_employee_worked_days_is_id($id)) {
        array_push($error, 'Id format error');
    }
    if (!hr_employee_worked_days_is_total_hours($total_hours)) {
        array_push($error, 'Total hours format error');
    }
    ###############################################################################
    # CONDITIONAL
    ################################################################################
    ################################################################################
    # MAKE UPDATE
    //hr_employee_worked_days_update_status($id, $status);
    if ($total_hours && ($total_hours != 'null' && $total_hours != null )) {
        hr_employee_worked_days_update_total_hour_by_id($id, $total_hours);
    }




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
