<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : NULL;
$year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : NULL;
$redi = (isset($_GET["redi"]) && $_GET["redi"] != "" ) ? ($_GET["redi"]) : 1;

$error = array();

////////////////////////////////////////////////////////////////////////////////
if (!$year) {
    array_push($error, 'Year is mandatory');
}

if (!$month) {
    array_push($error, 'Month is mandatory');
}
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
if (!$error) {




    foreach (hr_employee_worked_days_search_by_year_month($year, $month) as $key => $line) {

        $quantity = hr_employee_worked_days_total_days_worked_by_year_month_employee($year, $month, $line['employee_id']); // dias trabajados 

        $price = hr_employee_benefits_field_by_employee_id_code($line['employee_id'], 'meal_vouchers')['price']; // dias trabajados 

        $company_part = hr_employee_benefits_field_by_employee_id_code($line['employee_id'], 'meal_vouchers')['company_part']; // dias trabajados 

        hr_employee_benefits_by_month_push(
                $line['employee_id'], $year, $month, 'meal_vouchers',
                $quantity, $price, $company_part
        );
    }


    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=by_month");
            break;

        case 2:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=hr_employee_benefits_by_month&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=by_month");
            break;
    }
}


vardump($error);

die();

include view("hr_employee_benefits_by_month", "by_month");

