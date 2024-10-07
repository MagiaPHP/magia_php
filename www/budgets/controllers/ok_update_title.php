<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$title = (($_POST["title"]) != "") ? clean($_POST["title"]) : null;
$redi = (($_POST["redi"]) != "") ? clean($_POST["redi"]) : null;

$error = array();

if (!$budget_id) {
    array_push($error, 'Budget id is mandatory');
}
################################################################################

if (!$error) {
    budgets_update_title(
            $budget_id, $title
    );

    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $budget_id; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Title update : $budget_id <br>New title: [$title]";
    $doc_id = $budget_id;
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

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=budgets&a=details&id=$budget_id#title");
            break;

        default:
            header("Location: index.php?c=budgets&a=details&id=$budget_id#title");
            break;
    }
} else {

    include view("home", "pageError");
}
