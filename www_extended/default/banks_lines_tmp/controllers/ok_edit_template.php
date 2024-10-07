<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
//$account_number = (isset($_REQUEST["account_number"]) && $_REQUEST["account_number"] !="") ? clean($_REQUEST["account_number"]) : false;
$template = (isset($_REQUEST["template"]) && $_REQUEST["template"] != "") ? clean($_REQUEST["template"]) : false;
//$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
//$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
//if (!$account_number) {
//    array_push($error, 'Account_number is mandatory');
//}
if (!$template) {
    array_push($error, 'Template is mandatory');
}
//if (!$order_by) {
//    array_push($error, 'Order_by is mandatory');
//}
//if (!$status) {
//    array_push($error, 'Status is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
//if (! banks_lines_tmp_is_account_number($account_number) ) {
//    array_push($error, 'Account_number format error');
//}
if (!banks_lines_tmp_is_template($template)) {
    array_push($error, 'Template format error');
}
//if (! banks_lines_tmp_is_order_by($order_by) ) {
//    array_push($error, 'Order_by format error');
//}
//if (! banks_lines_tmp_is_status($status) ) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( banks_lines_tmp_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

//    banks_lines_tmp_edit(
//        $id ,  $account_number ,  $template ,  $order_by ,  $status    
//        );
//    
    banks_lines_tmp_update_template($id, $template);

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
            // ejemplo index.php?c=banks_lines_tmp&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
