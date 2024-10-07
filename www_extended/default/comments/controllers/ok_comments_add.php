<?php

if (!permissions_has_permission($u_rol, "comments", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$date = date('Y-m-d');
$sender_id = $u_id;
$doc = (isset($_POST['doc'])) ? clean($_POST['doc']) : false; // $c
$doc_id = (isset($_POST['doc_id'])) ? clean($_POST['doc_id']) : false;
$comment = (isset($_POST['comment'])) ? clean($_POST['comment']) : false;

$redi = (isset($_POST['redi'])) ? clean($_POST['redi']) : 1;

$order_by = 0;
$status = 1;

$error = array();

################################################################################

if (!$sender_id) {
    array_push($error, 'Sender id is mandatory');
}
if (!$doc) {
    array_push($error, 'Doc is mandatory');
}
if (!$doc_id) {
    array_push($error, 'Doc id is mandatory');
}
if (!$comment) {
    array_push($error, 'Comment is mandatory');
}
#########################################################################
#########################################################################
#########################################################################
#########################################################################
#########################################################################
#########################################################################


if (!$error) {

    comments_add(
            $date, $sender_id, $doc, $doc_id, $comment, $order_by, $status
    );

    // al mismo tiempo que agrego el comentario
    // actualizo la fecha que visto
//    comments_read_push($doc_id, $u_id);
    ############################################################################
    ############################################################################
    ##### COMMENTS #######################################################################
    ############################################################################
    $id = $doc_id;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a ,
    $w = null;
    $description = "Add comments doc: $doc, id= $doc_id, comments: [$comment]";
    $doc_id = $doc_id;
    $crud = "create";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request,
            get_user_ip(), get_user_ip6(), json_encode(get_user_browser())
    );
    ############################################################################
    ############################################################################
    ############################################################################ 
    ############################################################################
    ############################################################################
    ##### Del documento donde viene
    # $c = $doc
    # ## #######################################################################
    ############################################################################
    $id = $doc_id;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a ,
    $c = $doc;
    $w = null;
    $description = "Add comments doc: $doc, id= $doc_id, comments: [$comment]";
    $doc_id = $doc_id;
    $crud = "create";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request,
            get_user_ip(), get_user_ip6(), json_encode(get_user_browser())
    );
    ############################################################################
    ############################################################################
    ############################################################################ 


    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=comments");
            break;

        case 2:
            header("Location: index.php?c=comments&a=details&id=$doc_id");
            break;

        case 3:
            header("Location: index.php?c=comments&a=edit&id=$doc_id");
            break;

        case 4:
            header("Location: index.php?c=comments&a=details&id=$doc_id");
            break;

        case 5: // custom
            // ejemplo index.php?c=yellow_pages&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }


    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
} else {
    array_push($error, "Check your form");
}


include view("home", "pageError");
