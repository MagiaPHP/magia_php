<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$comments = (($_POST["comments"]) != "") ? clean($_POST["comments"]) : '';
$save = (($_POST["save"]) != "") ? clean($_POST["save"]) : null;
$redi = (($_POST["redi"]) != "") ? clean($_POST["redi"]) : null;
$error = array();

if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}

################################################################################

if (!$error) {

    budgets_comments_update(
            $budget_id, $comments
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
    //$id = $invoice_id; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Comments update : $budget_id <br>New comments: [$comments]";
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

    header("Location: index.php?c=budgets&a=edit&id=$budget_id#comments");
} else {

    include view("home", "pageError");
}
