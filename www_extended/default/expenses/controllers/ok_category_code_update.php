<?php

if (!permissions_has_permission($u_rol, 'expenses', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$category_code = ($_POST["category_code"] !== '' ) ? clean($_POST["category_code"]) : null;
$expense_id = ($_POST["expense_id"] !== '' ) ? clean($_POST["expense_id"]) : null;
$redi = (isset($_POST["redi"])) ? ($_POST["redi"]) : false;
$error = array();

################################################################################
if (!$expense_id) {
    array_push($error, 'Expense id is mandatory');
}
if (!$category_code) {
    array_push($error, 'Category code is mandatory');
}
#################################################################################
//if (expenses_search_by('category_code', $category_code)) {
//    array_push($error, 'This category code already exists');
//}
################################################################################



if (!$error) {

    if ($category_code == 'null') {
        expenses_update_category_code($expense_id, null);
    } else {
        expenses_update_category_code($expense_id, $category_code);
    }


    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses#1");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#2");
            break;

        case 3:
            header("Location: index.php?c=expenses&a=edit&id=$redi[id]#3");
            break;

        case 4:
            header("Location: index.php?c=expenses&a=delete&id=$redi[id]#4");
            break;

        case 5:
            header("Location: index.php?c=expenses&a=aaaaaaaa&id=$redi[id]#5");
            break;

        default:
            header("Location: index.php?c=config#default");
            break;
    }
} else {

    include view("home", "pageError");
}
