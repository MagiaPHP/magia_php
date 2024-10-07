<?php

if (!permissions_has_permission($u_rol, 'expenses', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$my_ref = ($_POST["my_ref"] !== '' ) ? clean($_POST["my_ref"]) : null;
$expense_id = ($_POST["expense_id"] !== '' ) ? clean($_POST["expense_id"]) : null;
$redi = (isset($_POST["redi"])) ? ($_POST["redi"]) : false;
$error = array();

################################################################################
if (!$my_ref) {
    array_push($error, 'My reference is mandatory');
}
#################################################################################
# FORMAT
// Pasamos todo a mayusculas
$my_ref = strtoupper($my_ref);
#################################################################################
if (expenses_search_by('my_ref', $my_ref)) {
    array_push($error, 'This reference already exists');
}
################################################################################

if (!$error) {

    expenses_update_my_ref($expense_id, $my_ref);

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
