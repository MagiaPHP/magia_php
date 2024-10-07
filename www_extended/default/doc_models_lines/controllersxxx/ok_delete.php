<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$ids = (isset($_REQUEST["ids"]) && $_REQUEST["ids"] != "" ) ? ($_REQUEST["ids"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;
$error = array();

foreach ($ids as $key => $id) {
    ###############################################################################
    # REQUERIDO
    ################################################################################
    if (!$id) {
        array_push($error, "ID Don't send");
    }
    ###############################################################################
    # FORMAT
    ################################################################################
    if (!doc_models_lines_is_id($id)) {
        array_push($error, 'Id format error');
    }
    ###############################################################################
    # CONDICIONAL
    ################################################################################

    doc_models_lines_delete(
            $id
    );
}


if (!$error) {

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=" . $redi["c"] . "&a=" . $redi["a"] . "#ok2 ");
            break;

        case 3:
            header("Location: index.php?c=doc_models&a=search&modele=a&=invoices#ok3 ");
            break;

        case 4:
            header("Location: index.php?c=doc_models&a=search&modele=" . $redi["modele"] . "&doc=" . $redi["doc"] . "#ok4");
            break;

        case 5:
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?c=doc_models_lines");
            break;
    }
} else {

    include view("home", "pageError");
}  
