<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : null;
$budget_id = (isset($_REQUEST["budget_id"])) ? clean($_REQUEST["budget_id"]) : null;
$title = (isset($_REQUEST["title"]) && ($_REQUEST["title"]) != "" ) ? clean($_REQUEST["title"]) : "No title";

$credit_note_id = (isset($_REQUEST["credit_note_id"])) ? clean($_REQUEST["credit_note_id"]) : null;
$client_id = (isset($_REQUEST["client_id"])) ? clean($_REQUEST["client_id"]) : null;
$sellers_id = (isset($_REQUEST["sellers_id"])) ? clean($_REQUEST["sellers_id"]) : null;
$date = (isset($_REQUEST["date"])) ? clean($_REQUEST["date"]) : null;
$date_registre = (isset($_REQUEST["date_registre"])) ? clean($_REQUEST["date_registre"]) : null;
$total = (isset($_REQUEST["total"])) ? clean($_REQUEST["total"]) : null;
$tax = (isset($_REQUEST["tax"])) ? clean($_REQUEST["tax"]) : null;
$advance = (isset($_REQUEST["advance"])) ? clean($_REQUEST["advance"]) : null;
$balance = (isset($_REQUEST["balance"])) ? clean($_REQUEST["balance"]) : null;
$comments = (isset($_REQUEST["comments"])) ? clean($_REQUEST["comments"]) : null;
$comments_private = (isset($_REQUEST["comments_private"])) ? clean($_REQUEST["comments_private"]) : null;
$r1 = (isset($_REQUEST["r1"])) ? clean($_REQUEST["r1"]) : null;
$r2 = (isset($_REQUEST["r2"])) ? clean($_REQUEST["r2"]) : null;
$r3 = (isset($_REQUEST["r3"])) ? clean($_REQUEST["r3"]) : null;
$fc = (isset($_REQUEST["fc"])) ? clean($_REQUEST["fc"]) : null;
$date_update = (isset($_REQUEST["date_update"])) ? clean($_REQUEST["date_update"]) : null;
$days = (isset($_REQUEST["days"])) ? clean($_REQUEST["days"]) : null;
$ce = (isset($_REQUEST["ce"])) ? clean($_REQUEST["ce"]) : null; //
$code = magia_uniqid();
$status = (isset($_REQUEST["status"])) ? clean($_REQUEST["status"]) : 0;
// la sede

$owner_id = contacts_field_id("owner_id", $client_id);

$headoffice_id = offices_headoffice_of_office($client_id);

$addresses_billing = (addresses_billing_by_contact_id($headoffice_id));

// cojo la direccion de entrega de la oficina
$addresses_delivery = (addresses_delivery_by_contact_id($client_id));

//if (contacts_field_id('type', $client_id)) {
//    $addresses_delivery = (addresses_delivery_by_contact_id($headoffice_id));
//} else {
//    $addresses_delivery = (addresses_delivery_by_contact_id($client_id));
//}




$addresses_billing_json = json_encode($addresses_billing);
$addresses_delivery_json = json_encode($addresses_delivery);

$error = array();

################################################################################
if (!$client_id) {
    array_push($error, '$cliente_id is mandatory');
}
if (!$addresses_billing_json) {
    array_push($error, ' addresses billing is mandatory');
}
if (!$addresses_delivery_json) {
    array_push($error, 'addresses delivery is mandatory');
}
################################################################################
// FORMATO
if ($id && !is_id($id)) {
    array_push($error, 'Budget number format error');
}

################################################################################
if (budgets_field_id('id', $id)) {
    array_push($error, 'Budget number already exist');
}
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    // Agrego un presupuesto a la oficina central 
    budgets_add_by_client_id_and_budget_number(
            $id, $headoffice_id, $code, 10
    );

    // busco el presupuesto agregado con el codigo
    $lastInsertId = budgets_field_code("id", $code);

    // budgets_update_title($budget_id, $title);
    // registro las direcciones de facturacion y entrega
    budgets_update_billing_address($lastInsertId, $addresses_billing_json);
    budgets_update_delivery_address($lastInsertId, $addresses_delivery_json);

    budgets_update_title($lastInsertId, $title);

    // actualizo la comunicacion extructurada segun el id creado 
    // // Esto no hace falta en el presupuesto 
    // // Esto no hace falta en el presupuesto 
    // // Esto no hace falta en el presupuesto 
//    if ($lastInsertId) {
//        budgets_update_ce($lastInsertId, generate_structured_communication($lastInsertId));
//    }
    ############################################################################
    ############################################################################
    ############################################################################
    // $id = $budget_id ;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Create new budget ($lastInsertId) ";
    $doc_id = $lastInsertId;
    $crud = "create";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
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




    header("Location: index.php?c=budgets&a=edit&id=$lastInsertId");
} else {
    include view("home", "pageError");
}    