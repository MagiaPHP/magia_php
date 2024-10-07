<?php

if (!permissions_has_permission($u_rol, "banks", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

## registra un numero de cuenta de una emprea 
## para hacer pagos en esta cuenta 
## solo si es sede
## 

$id = (($_POST['bank_id']) != "") ? clean($_POST['bank_id']) : false;

$account_number = banks_field_id("account_number", $id);

$error = array();

if (!$id) {
    array_push($error, 'id dont send');
}
if (!is_id($id)) {
    array_push($error, 'id format error send');
}

// si ya es por defecto invoices
// si esta bloqueada 
//si no pertenece a la empresa 
// si el numero de cuenta esta vacio 
// 


if (banks_field_id("invoices", $id)) {
    array_push($error, "Account number alrady default for invoices");
}
if (banks_field_id("status", $id) == 0) {
    array_push($error, "Account number is blocked, please unlock it first");
}
if (banks_field_id("contact_id", $id) != $u_owner_id) {
    array_push($error, "Account number is not yours");
}
if (banks_field_id("account_number", $id) == '' || banks_field_id("account_number", $id) == null) {
    array_push($error, "The account number cannot be empty");
}


if (!$error) {

    // primero pongo a cero la cuenta que esta por defecto para cobro de las facturas
    banks_unset_for_invoices(banks_get_account_number_for_invoices($u_owner_id));

    // pongo a 1 la cuenta que envio 
    banks_set_for_invoices($account_number);

    ############################################################################
    $data = json_encode(array(
        $account_number
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Set account number [$account_number] for invoices contact: $contact_id";
    $doc_id = $contact_id;
    $crud = "update";
    //$error = null ;
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



    header("Location: index.php?c=contacts&a=banks&id=$u_owner_id");
} else {

    include view("home", "pageError");
}



