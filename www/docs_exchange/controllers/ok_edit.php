<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$reciver_tva = (isset($_REQUEST["reciver_tva"]) && $_REQUEST["reciver_tva"] !="") ? clean($_REQUEST["reciver_tva"]) : false;
$sender_name = (isset($_REQUEST["sender_name"]) && $_REQUEST["sender_name"] !="") ? clean($_REQUEST["sender_name"]) : false;
$label = (isset($_REQUEST["label"]) && $_REQUEST["label"] !="") ? clean($_REQUEST["label"]) : false;
$sender_tva = (isset($_REQUEST["sender_tva"]) && $_REQUEST["sender_tva"] !="") ? clean($_REQUEST["sender_tva"]) : false;
$doc_type = (isset($_REQUEST["doc_type"]) && $_REQUEST["doc_type"] !="") ? clean($_REQUEST["doc_type"]) : false;
$doc_id = (isset($_REQUEST["doc_id"]) && $_REQUEST["doc_id"] !="") ? clean($_REQUEST["doc_id"]) : false;
$json = (isset($_REQUEST["json"]) && $_REQUEST["json"] !="") ? clean($_REQUEST["json"]) : false;
$pdf_base64 = (isset($_REQUEST["pdf_base64"]) && $_REQUEST["pdf_base64"] !="") ? clean($_REQUEST["pdf_base64"]) : false;
$date_send = (isset($_REQUEST["date_send"]) && $_REQUEST["date_send"] !="") ? clean($_REQUEST["date_send"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
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
if (! $error ) {
    
    docs_exchange_edit(
        $id ,  $reciver_tva ,  $sender_name ,  $label ,  $sender_tva ,  $doc_type ,  $doc_id ,  $json ,  $pdf_base64 ,  $date_send ,  $order_by ,  $status    
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
            // ejemplo index.php?c=docs_exchange&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
