<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$comments = (($_POST["comments"]) != "") ? clean($_POST["comments"]) : '';
$save = (($_POST["save"]) != "") ? clean($_POST["save"]) : null;
$redi = (($_POST["redi"]) != "") ? clean($_POST["redi"]) : 1;
$error = array();

if (!$expense_id) {
    array_push($error, 'Expense id is mandatory');
}

################################################################################

if (!$error) {

    expenses_comments_update(
            $expense_id, $comments
    );

    // si pide de registrar, 
    // registramos en la list ade comentarios
    if ($save) {
        // busco si hay comentario con ese controlador, 
        // si no hay lo registro 
        if (!docs_comments_search_by_controller_comment($c, $comments)) {
            docs_comments_add($c, $comments, 1, 1);
        }
    }

    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################
    ############################################################################ 

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#comments");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=edit&id=$expense_id#comments");
            break;

        default:
            header("Location: index.php#comments");
            break;
    }
} else {

    include view("home", "pageError");
}
