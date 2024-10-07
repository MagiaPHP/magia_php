<?php

if (!permissions_has_permission($u_rol, 'config', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = ($_POST["data"] !== '' ) ? clean($_POST["data"]) : null;
$redi = (isset($_POST["redi"])) ? ($_POST["redi"]) : false;
$error = array();

$data = json_encode($data);

################################################################################
################################################################################
################################################################################

if (!$error) {

    // si no existe lo crea
    _options_push("config_invoices_der_bank_lines_to_show", $data, "invoices");

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=invoices#1");
            break;

        case 2:
            header("Location: index.php?c=invoices&a=details&id=$redi[id]#2");
            break;

        case 3:
            header("Location: index.php?c=invoices&a=edit&id=$redi[id]#3");
            break;

        case 4:
            header("Location: index.php?c=invoices&a=delete&id=$redi[id]#4");
            break;

        case 5:
            header("Location: index.php?c=invoices&a=aaaaaaaa&id=$redi[id]#5");
            break;

        default:
            header("Location: index.php?c=config#default");
            break;
    }
} else {

    include view("home", "pageError");
}
