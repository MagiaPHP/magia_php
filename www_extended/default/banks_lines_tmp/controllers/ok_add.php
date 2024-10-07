<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$account_number = (isset($_POST["account_number"]) && $_POST["account_number"] != "" && $_POST["account_number"] != "null" ) ? clean($_POST["account_number"]) : '';
$template = (isset($_POST["template"]) && $_POST["template"] != "" && $_POST["template"] != "null" ) ? clean($_POST["template"]) : '';
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1; //banks_lines_tmp_next_order_by($account_number);
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : '1';
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();

################################################################################
# REQUIRED
################################################################################
if (!$account_number) {
    array_push($error, 'Account_number is mandatory');
}
if (!$template) {
    array_push($error, 'Template is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!banks_lines_tmp_is_account_number($account_number)) {
    array_push($error, 'Account_number format error');
}
if (!banks_lines_tmp_is_template($template)) {
    array_push($error, 'Template format error');
}
if (!banks_lines_tmp_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!banks_lines_tmp_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( banks_lines_tmp_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = banks_lines_tmp_add(
            $account_number, $template, $order_by, $status
    );

    // Tambien aumento en uno el contador de order_by
    // para asi darle mas peso a los mas usados 
    //


    $id = banks_templates_field_template('id', $template);

//    $next_order = banks_templates_field_id('order_by', $id) + 1;
    //banks_templates_update_order_by($id, $next_order);


    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=banks_lines_tmp");
            break;

        case 2:
            header("Location: index.php?c=banks_lines_tmp&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=banks_lines_tmp&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=banks_lines_tmp&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=banks_lines_tmp&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        case 6: //             
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&file=" . $redi['file'] . "&account_number=$account_number#6");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


