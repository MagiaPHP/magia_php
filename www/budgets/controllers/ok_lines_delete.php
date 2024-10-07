<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;
$redi = (isset($_GET["redi"])) ? clean($_GET["redi"]) : false;

$budget_id = budget_lines_field_id("budget_id", $id);

$error = array();

if (!$id) {
    array_push($error, '$budget_id is mandatory');
}


#************************************************************************
if (!budget_lines_is_id($id)) {
    array_push($error, "Id format error");
}

################################################################################
################################################################################
if (!$error) {
    budget_lines_delete(
            $id
    );

    // Esto me actualiza los totales en la factura
    budgets_update_total_tax($budget_id, budget_lines_totalHTVA($budget_id), budget_lines_totalTVA($budget_id));

    // actualizo el total del presupuesto 
    budgets_update_total_tax($budget_id, budget_lines_totalHTVA($budget_id), budget_lines_totalTVA($budget_id));

    ############################################################################
    ############################################################################
    ############################################################################
    // $id = $budget_id ;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Delete line $id from budget ($budget_id)";
    $doc_id = $budget_id;
    $crud = "edit";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################
    ############################################################################
    ############################################################################ 



    switch ($redi) {
        case 1:
            header("Location: index.php?c=budgets&a=edit&id=$budget_id#items_add");

            break;

        default:
            header("Location: index.php?c=budgets&a=edit&id=$budget_id#items_add");
            break;
    }
} else {
    include view("home", "pageError");
}    
