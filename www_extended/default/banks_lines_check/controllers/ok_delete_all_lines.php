<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;

$error = array();

################################################################################
################################################################################

if (!$error) {


    banks_lines_check_delete_all_lines();

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=banks_lines_check");
            break;

        case 2:
            header("Location: index.php?c=banks_lines_check&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=banks_lines_check&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=banks_lines_check&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=banks_lines_check&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


