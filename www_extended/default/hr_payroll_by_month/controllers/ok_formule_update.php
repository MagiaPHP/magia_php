<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$all_employees = (isset($_POST["all_employees"]) && $_POST["all_employees"] != "" && $_POST["all_employees"] != "null" ) ? clean($_POST["all_employees"]) : false;
$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] != "" && $_POST["employee_id"] != "null" ) ? clean($_POST["employee_id"]) : null;

$month = (isset($_POST["month"]) && $_POST["month"] != "" && $_POST["month"] != "null" ) ? clean($_POST["month"]) : null;
$year = (isset($_POST["year"]) && $_POST["year"] != "" && $_POST["year"] != "null" ) ? clean($_POST["year"]) : null;

$column = (isset($_POST["column"]) && $_POST["column"] != "" && $_POST["column"] != "null" ) ? clean($_POST["column"]) : null;
$formule = (isset($_POST["formule"]) && $_POST["formule"] != "" && $_POST["formule"] != "null" ) ? clean($_POST["formule"]) : null;
//
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
//
$error = array();

################################################################################
################################################################################
# REQUIRED
if (!$employee_id) {
    array_push($error, 'Employee id is mandatory');
}
if (!$month) {
    array_push($error, 'Month is mandatory');
}
if (!$year) {
    array_push($error, 'Year is mandatory');
}
if (!$column) {
    array_push($error, 'Column is mandatory');
}
################################################################################
###############################################################################
# FORMAT

$date_from = "$year-$month-01";  // Primer día del mes
// Crear un objeto DateTime para calcular el último día del mes
$datetime = new DateTime("$year-$month-01");
$datetime->modify('last day of this month');  // Modificar para obtener el último día del mes
$date_to = $datetime->format('Y-m-d');  // Convertirlo en string (YYYY-MM-DD)


###############################################################################
###############################################################################
# CONDITIONAL
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################


if (!$error) {

    if ($all_employees) {
        // todos los presentes en esed mes
        foreach (hr_employee_worked_days_search_by_from_to($date_from, $date_to) as $item) {
            hr_payroll_by_month_update_formule_all($year, $month, $column, $formule);
        }
    } else {
        // solo uno 
        hr_payroll_by_month_update_formule_by($employee_id, $year, $month, $column, $formule);
    }

// actualizo todos los campos
    foreach (array('value_round', 'total_sold', 'pay_to_bank', 'pay_to_cash', 'total_to_pay') as $column) {
        // actulizo la formula 
        $formule = hr_payroll_by_month_field_by('formule', $employee_id, $year, $month, $column);
        $hrpr = new Payroll_by_month();
        $hrpr->setPayroll_by_month($employee_id, $year, $month);
        $value = $hrpr->calculate_formule($formule);
        hr_payroll_by_month_update_value_by($employee_id, $year, $month, $column, $value);
    }




    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_payroll_by_month");
            break;

        case 2:
            header("Location: index.php?c=hr_payroll_by_month&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_payroll_by_month&a=by_month");
            break;

        case 4:
            header("Location: index.php?c=hr_payroll_by_month&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_payroll&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        case 6:
            header("Location: index.php?c=hr_payroll_by_month&a=by_month&month=$month&year=$year");
            break;

        default:
            header("Location: index.php?");
            break;
    }
    //
    //
    //
    //
    //
    //
} else {

    include view("home", "pageError");
}


    