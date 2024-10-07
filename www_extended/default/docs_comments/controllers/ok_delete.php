<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;

$error = array();
###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
###############################################################################
# FORMAT
################################################################################
if (!docs_comments_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################


if (!$error) {

    docs_comments_delete(
            $id
    );

    switch ($redi['redi']) {
        case 0:
            header("Location: index.php?c=docs_comments");
            break;

        case 1: // regresa a las facturas
            header("Location: index.php?c=invoices&a=edit&id=$redi[invoice_id]#comments");
            break;

        case 2: // regresa a los presupuesto
            header("Location: index.php?c=budgets&a=edit&id=$redi[budget_id]#comments");
            break;

        case 3: // regresa a los gastos
            header("Location: index.php?c=expenses&a=edit&id=$redi[expense_id]#comments");
            break;

        default:
            break;
    }
}

include view("docs_comments", "delete");
