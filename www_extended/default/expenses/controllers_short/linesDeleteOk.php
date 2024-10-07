<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;

$expense_id = expenses_lines_field_id("expense_id", $id);

$lineDetails = json_encode(expenses_lines_details($id));

$error = array();

if (!$id) {
    array_push($error, 'Expense id is mandatory');
}


#************************************************************************
if (!expenses_lines_is_id($id)) {
    array_push($error, "Id format error");
}

################################################################################

if (!$error) {


    expenses_lines_delete(
            $id
    );

    // Esto me actualiza los totales en la factura
    expenses_update_total_tax($expense_id, expenses_lines_totalHTVA($expense_id), expenses_lines_totalTVA($expense_id));

    ############################################################################
    ############################################################################
    ############################################################################


    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Delete item line [$id] from expense: $expense_id <br>Line details [ $lineDetails ]";

    $doc_id = $expense_id;
    $crud = "update";
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


    header("Location: index.php?c=expenses&a=edit&id=$expense_id#items");

    //
    //
    //
    //
} else {

    include view("home", "pageError");
}
