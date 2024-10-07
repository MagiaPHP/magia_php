<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$reciver_tva = (isset($_POST["reciver_tva"]) && $_POST["reciver_tva"] !=""  && $_POST["reciver_tva"] !="null" ) ? clean($_POST["reciver_tva"]) :  null  ;
$sender_name = (isset($_POST["sender_name"]) && $_POST["sender_name"] !=""  && $_POST["sender_name"] !="null" ) ? clean($_POST["sender_name"]) :  null  ;
$label = (isset($_POST["label"]) && $_POST["label"] !=""  && $_POST["label"] !="null" ) ? clean($_POST["label"]) :  null  ;
$sender_tva = (isset($_POST["sender_tva"]) && $_POST["sender_tva"] !=""  && $_POST["sender_tva"] !="null" ) ? clean($_POST["sender_tva"]) :  null  ;
$doc_type = (isset($_POST["doc_type"]) && $_POST["doc_type"] !=""  && $_POST["doc_type"] !="null" ) ? clean($_POST["doc_type"]) :  null  ;
$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] !=""  && $_POST["doc_id"] !="null" ) ? clean($_POST["doc_id"]) :  null  ;
$json = (isset($_POST["json"]) && $_POST["json"] !=""  && $_POST["json"] !="null" ) ? clean($_POST["json"]) :  null  ;
$pdf_base64 = (isset($_POST["pdf_base64"]) && $_POST["pdf_base64"] !=""  && $_POST["pdf_base64"] !="null" ) ? clean($_POST["pdf_base64"]) :  null  ;
$date_send = (isset($_POST["date_send"]) && $_POST["date_send"] !="" ) ? clean($_POST["date_send"]) : current_timestamp() ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$reciver_tva) {
    array_push($error, 'Reciver_tva is mandatory');
}
if (!$sender_tva) {
    array_push($error, 'Sender_tva is mandatory');
}
if (!$doc_type) {
    array_push($error, 'Doc_type is mandatory');
}
if (!$doc_id) {
    array_push($error, 'Doc_id is mandatory');
}
if (!$json) {
    array_push($error, 'Json is mandatory');
}
if (!$pdf_base64) {
    array_push($error, 'Pdf_base64 is mandatory');
}
if (!$date_send) {
    array_push($error, 'Date_send is mandatory');
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
if (! docs_exchange_is_reciver_tva($reciver_tva) ) {
    array_push($error, 'Reciver_tva format error');
}
if (! docs_exchange_is_sender_tva($sender_tva) ) {
    array_push($error, 'Sender_tva format error');
}
if (! docs_exchange_is_doc_type($doc_type) ) {
    array_push($error, 'Doc_type format error');
}
if (! docs_exchange_is_doc_id($doc_id) ) {
    array_push($error, 'Doc_id format error');
}
if (! docs_exchange_is_json($json) ) {
    array_push($error, 'Json format error');
}
if (! docs_exchange_is_pdf_base64($pdf_base64) ) {
    array_push($error, 'Pdf_base64 format error');
}
if (! docs_exchange_is_date_send($date_send) ) {
    array_push($error, 'Date_send format error');
}
if (! docs_exchange_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! docs_exchange_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( docs_exchange_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = docs_exchange_add(
        $reciver_tva ,  $sender_name ,  $label ,  $sender_tva ,  $doc_type ,  $doc_id ,  $json ,  $pdf_base64 ,  $date_send ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=docs_exchange");
            break;
            
        case 2:
            header("Location: index.php?c=docs_exchange&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=docs_exchange&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=docs_exchange&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=docs_exchange&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


