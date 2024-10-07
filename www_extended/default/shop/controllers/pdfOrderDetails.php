<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

################################################################################
# Recolection de variables desde el formulario
################################################################################
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$error = array();
################################################################################
if (!$id) {
    array_push($error, "id is mandatory");
}
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($id)) {
    array_push($error, "Error in id");
}

################################################################################
# proceso
# Verifiar si el id de la orden pertenece a quien la solicita
//if (orders_field_id("company_id", $id) != $u_owner_id) {
//    array_push($error, "This order is not yours");
//}

if (users_can_see_others_offices($u_id)) {
    // puedo ver otras oficinas 
    if (offices_headoffice_of_office(orders_field_id("company_id", $id)) !== contacts_work_for($u_id)) {
        array_push($error, "This order does not belong to your company");

        //vardump(orders_field_id("company_id" , $id)); 
        //vardump(contacts_work_for($u_id)); 
        // die(); 
    }
} else {

    if (orders_field_id("company_id", $id) !== contacts_work_at($u_id)) {
        array_push($error, "This order does not belong to your office");
    }
}



################################################################################

if (!$error) {

    $pdf_order = shop_orders_details($id);
    $pdf_order_remake = ($pdf_order["remake"] ) ? $pdf_order["remake"] : "No";
    $pdf_order_side = ($pdf_order["side"] ) ? $pdf_order["side"] : null;
    $pdf_order_date = substr($pdf_order["date"], -0, 10);

    $wd = ( $pdf_order["delivery_days"] > 1) ?
            $pdf_order["delivery_days"] . " " . _trc(' Working days after reception') :
            $pdf_order["delivery_days"] . " " . _trc(' Working day after reception');

    $pdf_order_date_delivery = ($pdf_order["date_delivery"] != null) ?
            $pdf_order["date_delivery"] :
            $wd;

    // si hay fecha de entrega
    // se calcula los dias de entrega
    // si no, solo pongo los dias hay para entregar despues de la recepcion 
    $pdf_dif_day = ( $pdf_order['date_delivery'] != null ) ?
            intval(ceil(( magia_dates_day_between(substr($pdf_order['date'], 0, 10), $pdf_order['date_delivery']))) / 86400) :
            $pdf_order['delivery_days']
    ;

    $da = json_decode($pdf_order["address_delivery"], true);

    $da['transport_code'] = addresses_details($da['id'])['transport_code'];
    $da['transport_ref'] = addresses_details($da['id'])['transport_ref'];

    $ba = json_decode($pdf_order["address_billing"], true);

    $client = array(
        "id" => $pdf_order['company_id'],
        "name" => contacts_field_id("name", $pdf_order['company_id']),
        "client_ref" => ($pdf_order['client_ref']) ? $pdf_order['client_ref'] : "None",
        "da_id" => $da['id'],
        "da_number" => utf8_decode($da['number']),
        "da_address" => utf8_decode($da['address']),
        "da_postcode" => utf8_decode($da['postcode']),
        "da_barrio" => utf8_decode($da['barrio']),
        "da_city" => utf8_decode($da['city']),
        "da_country" => utf8_decode($da['country']),
        "da_transport_code" => $da['transport_code'],
        "da_transport_ref" => $da['transport_ref'],
        "ba_id" => $ba['id'],
        "ba_number" => utf8_decode($ba['number']),
        "ba_address" => utf8_decode($ba['address']),
        "ba_postcode" => utf8_decode($ba['postcode']),
        "ba_barrio" => utf8_decode($ba['barrio']),
        "ba_city" => utf8_decode($ba['city']),
        "ba_country" => utf8_decode($ba['country']),
    );

    $patient = array(
        "id" => $pdf_order['patient_id'],
        "name" => utf8_decode(contacts_field_id("name", $pdf_order['patient_id'])),
        "lastname" => utf8_decode(contacts_field_id("lastname", $pdf_order['patient_id'])),
        "bd" => contacts_field_id("birthdate", $pdf_order['patient_id']),
        "nn" => directory_list_by_contact_name($pdf_order['patient_id'], "nationalNumber"),
        //"nn" => "xx" ,
        "tel" => "+",
        "a_id" => "",
        "a_number" => utf8_decode(addresses_field_id("number", $pdf_order['patient_id'])),
        "a_address" => utf8_decode(addresses_field_id("address", $pdf_order['patient_id'])),
        "a_postcode" => utf8_decode(addresses_field_id("postcode", $pdf_order['patient_id'])),
        "a_city" => utf8_decode(addresses_field_id("city", $pdf_order['patient_id'])),
        "a_barrio" => utf8_decode(addresses_field_id("barrio", $pdf_order['patient_id'])),
        "a_country" => utf8_decode(addresses_field_id("country", $pdf_order['patient_id'])),
        "pa" => "legere",
        "co" => "Dure",
    );

    $pdf_items_l = orders_lines_order_id_side($id, 'L');
    $pdf_items_r = orders_lines_order_id_side($id, 'R');
    $pdf_items_s = orders_lines_order_id_side($id, 'S');

    ############################################################################
    $data = json_encode(array(
        $id
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "orders";
    //$a = "Add file" ;
    $w = null;
    // $txt
    $description = "User print order [ $id ]";
    $doc_id = $id;
    $crud = "read";
    //$error = null ;
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










    include view("shop", "pdfOrderDetails");
} else {


    include view("home", "pageError");
}