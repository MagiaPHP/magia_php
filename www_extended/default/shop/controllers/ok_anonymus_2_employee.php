<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$orders = (!empty($_POST["orders"])) ? ($_POST["orders"]) : false;
$employee_id = (!empty($_POST["employee_id"])) ? ($_POST["employee_id"]) : false;
$redi = (!empty($_POST["redi"])) ? clean($_POST["redi"]) : 1;

$error = array();

if (!$orders) {
    array_push($error, '$orders is mandatory');
}
if (!$employee_id) {
    array_push($error, '$employee_id is mandatory');
}
//
if (!is_id($employee_id)) {
    array_push($error, '$employee_id format error send');
}

foreach ($orders as $order_id) {
    if (!is_id($order_id)) {
        array_push($error, '$order_id format error send');
    }
}
// trabaja para esta empresa?
if (contacts_work_for($employee_id) != offices_headoffice_of_office($u_owner_id)) {
    array_push($error, 'This employee dont work for this company');
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    foreach ($orders as $order_id) {

        orders_update_behalf_of($order_id, $employee_id);

        ############################################################################
        $level = null;
        $date = null;
        //$u_id
        //$u_rol , 
        //$c , $a , 
        $w = null;
        $description = "Change anonymus to employee [$employee_id] ";
        $doc_id = $order_id;
        $crud = "update";
        $error = null;
        $val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
        $val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
        $val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $doc_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################
    }






    switch (intval($redi)) {
        case 1:

            header("Location: index.php?c=shop&a=anonymus");

            break;

        default:
            header("Location: index.php?c=shop");
            break;
    }
} else {
    include view("home", "pageError");
}







