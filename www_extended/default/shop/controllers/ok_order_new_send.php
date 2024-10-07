<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Cra un pedidos desde shop
 */
$qty_L = (!empty($_POST['qty_L'])) ? clean($_POST['qty_L']) : 1;
$qty_R = (!empty($_POST['qty_R'])) ? clean($_POST['qty_R']) : 1;
//
$comments = (!empty($_POST['comments'])) ? clean($_POST['comments']) : '';
$order_json = json_encode($_SESSION['order']);
//$company_id = orders_field_id("company_id" , $id) ;
$company_id = contacts_work_at($u_id);
//
$headOffice_id = offices_headoffice_of_office($company_id);
$via = "Poste";
$side = $_SESSION['order']['side'];
$client_ref = "";
//$discount = ()? "" : "" ; 
$discounts = (contacts_field_id("discounts", $headOffice_id)) ? contacts_field_id("discounts", $headOffice_id) : 0;
$express = null;
$address_delivery_id = $_SESSION['order']['address_delivery'];
// Este es el paciente
$contact_id = $_SESSION['order']['patient_id'];
// de este fecha depende si es expres o no 
$date_delivery = $_SESSION['order']['date_delivery'];
$delivery_days = intval($_SESSION['order']['delivery_days']);
$remake = null;
$hearring_loss = null;
$ear = NULL;
$comments = $comments;
//$code                 = ( ! empty($_POST['code'])) ? clean($_POST['code']) : null ;
$code = magia_uniqid();

$lines_array = array(
        // 0=>array("code"=>"COD1","description"=>"Description del art" ), 
        // 2=>array("code"=>"COD1","description"=>"Description del art" ), 
);

// Saco el pais de donde es la $company_id; 
// 
// FR, BE, ES
$headOffice_country = addresses_billing_by_contact_id($headOffice_id)['country'];
// $tva_to_put = country_tax_search_by_country_tax($headOffice_country, $tva);
//vardump($headOffice_id);
//vardump($headOffice_country);
//vardump(country_tax_search_by_country_tax($headOffice_country, 21));
//die(); 

$error = array();

##########################################################################################################
# Verificacion de variables obligadas
# -----------------------------------
if (!$via) {
    array_push($error, '$via is mandatory');
}

if (!$contact_id) {
    array_push($error, '$contact_id is mandatory');
}

if (!$code) {
    array_push($error, '$code is mandatory');
}
##########################################################################################################
# Verificacion FORMATO de variables
# ---------------------------------
if (!orders_is_via($via)) {
    array_push($error, '$via format is not correct');
}
if (!contacts_is_id($contact_id)) {
    array_push($error, '$contact_id is is mandatory');
}
#
##########################################################################################################
# Proceso: 
# 1 $client_ref       Ya existe o no?
# 1.1 si contacto no esta en lista de pacientes onerlo 
# 2 $express          //
# 3 $address_delivery_id Pertenece al usuario?
# 4 $contact_id       Pertenece al usuario?
# 5 $remake           Viene de una orden que pertenece al paciente?
# 6 $hearring_loss    //
# 7 $ear              //
# 8 $comments         //
# 9 Asignacion de Bacs
# 10 company_id es del usuario?
# 11 Si el cliente no esta desactivo
# 12 control de fechas 
#   date_delivery debe ser superior a fechad e registro 
#   
# 
// 1 
// en la sede no se puede hacer ordenes
if (offices_is_headoffice(contacts_work_at($u_id))) {
    // array_push($error , "The headoffice can not make order") ;
}
// 2 
// 3
$address_delivery_json = json_encode(addresses_details($address_delivery_id));

// 4 Verifica que el contacto pertenesca al 
if (contacts_field_id("owner_id", $contact_id) != $u_owner_id) {
    array_push($error, 'This patient is not yours');
}

// esto verifica que exista una sola orden con el codigo enviado 
if (orders_field_code('id', $code)) {
    array_push($error, 'Please only one order with this code');
    array_push($error, 'It usually happens when you press the send button several times');
}


// 5
//if(orders_field_id("contact_id", $remake) != $contact_id ){
//  array_push($error, 'This order does not belong to the patient');
//}
// 6
// 7
// 8
// 9
// 10
// 11
# 
#
#
###########################################################################################################
# Preparacion o transformacion de variables para ingreso a la base de datos 
#
###########################################################################################################
#  
// lista de los bacs libres
$bacs = bacs_free_list();
// cojo el primero, si hay lo pongo sino paso el master
$bac_free = ( $bacs != null) ? $bacs[0]['name'] : _options_option("MasterBac");

if (!$bac_free) {
    array_push($error, 'There is not bac free, please contact the administrator');
}
//Si hay un bac libre lo mando a ready to scan directamente 
// sino lo pongo como registrado 
//$status = ($bac_free != NULL ) ? 20 : 10 ;
$status = 10; // REGISTRED
//
//
//
//$ab = shop_addresses_billing();
$ab = addresses_billing_by_contact_id(contacts_work_for($u_id));
$address_billing_id = $ab[0];
$address_billing_json = json_encode($ab);

$discounts = intval($discounts);
$description_json = json_encode($_POST);
//$price = products_search_full(0) ;
$price = 0;
$ce = null;
$remake = null;
$hearing_loss = null;
$ear = null;
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    // registro la order
    shop_orders_add_short(
            $side,
            $delivery_days,
            $date_delivery,
            $address_billing_json,
            $address_delivery_json,
            $contact_id,
            $bac_free,
            $comments,
            $code,
            $status);

    // averiguo cual fue la orden agregada con ese codigo
    $last_order_id = orders_field_code("id", $code);

    // actualizo la fecha de lectura de comentarios

    comments_read_add($last_order_id, $u_id, null, 1, 1);

    if ($last_order_id) {

        // Agrego un primer comentario 
        if ($comments) {
            comments_add(null, $u_id, 'orders', $last_order_id, $comments, 1, 1);
        }
        // si no esta en la tabla de pacientes, lo pongo
        if (!patients_according_company_contact($u_owner_id, $contact_id)) {
            patients_add($u_owner_id, '', $contact_id, null, null, null);
        }


        // el master bac nunca llega numero de identificdor
        if ($bac_free != "MASTER BAC") {
            // asigno el numero de orden al bac 
            bacs_add_order($last_order_id, $bac_free);
        }


        // AGREGO los items de la izquierda
        // AGREGO los items de la izquierda
        // AGREGO los items de la izquierda
        // AGREGO los items de la izquierda
        // AGREGO los items de la izquierda
        foreach ($_SESSION['order'] as $key => $value) {


            if (!empty($value['L'])) {
                // si no son options
                //
                $initial = strtoupper(substr($key, 0, 3));

                if ($initial != "OPT") { // si es diferente de OPT que son las opciones,                     
                    $code_p = $initial . $value['L'];
                    $description_p = (products_get_name_by_code($code_p)) ? products_get_name_by_code($code_p) : "Unknown";
                    $quantity = $qty_L;
                    $price = (products_get_price_by_codeproduct($code_p)) ? products_get_price_by_codeproduct($code_p) : 0;
                    $tva = (products_get_tax_by_code($code_p)) ? products_get_tax_by_code($code_p) : 0;

                    $tva_to_put = country_tax_search_by_country_tax($headOffice_country, $tva);

                    //    echo "$last_order_id, $code_p, $quantity, $description_p, $price, $tva, 'L'<br>"; 

                    if ($initial == "TYP") {
                        // si es la inicial como TYP, Agrego el lado, 
                        // Esto para evitar escribir a cada linea SIDE 
                        shop_orders_add_line($last_order_id, "SIDEL", $qty_L, "Left side", 0, 0, 'L');
                    }



                    shop_orders_add_line($last_order_id, $code_p, $quantity, $description_p, $price, $tva_to_put, 'L', $discounts);
                } else {
                    // Recorro las opciones
                    // Recorro las opciones
                    // Recorro las opciones
                    foreach ($_SESSION['order']['option_id']["L"] as $key => $id) {
                        $code_p = "OPT" . $id;
                        $description_p = (options_field_id("option", $id)) ? options_field_id("option", $id) : "Unknown";
                        ;
                        $quantity = 1;
                        $price = (options_field_id('price', $id)) ? options_field_id('price', $id) : 0;
                        $tva = (options_field_id('tax', $id)) ? options_field_id('tax', $id) : 0;
                        $tva_to_put = country_tax_search_by_country_tax($headOffice_country, $tva);

                        shop_orders_add_line($last_order_id, $code_p, $quantity, $description_p, $price, $tva_to_put, 'L', $discounts);
                    }
                }
            }
        }
        // DERECHA
        // DERECHA
        // DERECHA
        // DERECHA
        // DERECHA
        // DERECHA
        // DERECHA

        foreach ($_SESSION['order'] as $key => $value) {
            if (!empty($value['R'])) {


                $initial = strtoupper(substr($key, 0, 3));
                if ($initial != "OPT") { // si es diferente de OPT que son las opciones,                     
                    $code_p = $initial . $value['R'];

                    $description_p = (products_get_name_by_code($code_p)) ? products_get_name_by_code($code_p) : "Unknown";
                    $quantity = $qty_R;
                    $price = (products_get_price_by_codeproduct($code_p)) ? products_get_price_by_codeproduct($code_p) : 0;
                    $tva = (products_get_tax_by_code($code_p)) ? products_get_tax_by_code($code_p) : 0;
                    $tva_to_put = country_tax_search_by_country_tax($headOffice_country, $tva);

                    if ($initial == "TYP") {
                        // si es la inicial como TYP, Agrego el lado, 
                        // Esto para evitar escribir a cada linea SIDE 
                        shop_orders_add_line($last_order_id, "SIDER", $qty_R, "Right side", 0, 0, 'R');
                    }

                    shop_orders_add_line($last_order_id, $code_p, $quantity, $description_p, $price, $tva_to_put, 'R', $discounts);
                } else {
                    // Recorro las opciones
                    foreach ($_SESSION['order']['option_id']["R"] as $key => $id) {
                        $code_p = "OPT" . $id;

                        $description_p = (options_field_id("option", $id)) ? options_field_id("option", $id) : "Unknown";
                        ;
                        $quantity = 1;
                        $price = (options_field_id('price', $id)) ? options_field_id('price', $id) : 0;
                        $tva = (options_field_id('tax', $id)) ? options_field_id('tax', $id) : 0;

                        $tva_to_put = country_tax_search_by_country_tax($headOffice_country, $tva);

                        shop_orders_add_line($last_order_id, $code_p, $quantity, $description_p, $price, $tva_to_put, 'R', $discounts);
                    }
                }
            }
        }


        // reseteo la sesion 
        $_SESSION['order'] = null;

//        ## --------------------------------------------------------------------
//        ## --------------------------------------------------------------------
//        ## --------------------------------------------------------------------
//        $email_Subject = "$config_company_name New order";
//        $reciver_email = "roencosa@gmail.com";
//        $reciver_name = "Robi";
//        $reciver_lastname = "C.";
//        $email_Body = "Nuevo pedido registrado $order_json";
//        $email_AltBody = "<h1>Nuevo pedido</h1>$order_json";
//        ##----------------------------------------------------------------------        
//        //include controller("emails", "send_email_file") ;
//        include controller("emails", "send_email");
//        ##----------------------------------------------------------------------



        header("Location: index.php?c=shop&a=orderDetails&id=$last_order_id");
    } else {

        array_push($error, 'Your order could not be registered, send it by email please');
        ///FATAL ERROR///FATAL ERROR///FATAL ERROR///FATAL ERROR///FATAL ERROR

        include view("home", "pageError");
    }
} else {


    include view("home", "pageError");
}

die();
header("Location: index.php?c=shop&a=order_new_10&order_id=$last_order_id");

/*
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// Calcelar esta order
//
//$order_id   = ( ! empty($_REQUEST['order_id'])) ? clean($_REQUEST['order_id']) : false;
$comments   = ( ! empty($_REQUEST['comments'])) ? clean($_REQUEST['comments']) : false;
//
$via                = "Poste";
$side               = ""; 
$express            = null; 
$date_delivery      = $_SESSION['order']['date_delivery']; 
$client_ref         = null; 
$address_billing    = $_SESSION['order']['address_delivery']; 
$address_delivery   = $_SESSION['order']['address_delivery']; 
$patient_id         = $_SESSION['order']['patient_id']; 
$description_json   = ''; 
$bac                = bacs_free(); 
$price              = 0;  
$discount           = 0; 
$ce                 = null; 
$remake             = null; 
$hearing_loss       = null; 
$ear                = null;     
$comments           = $comments; 
$code               = magia_uniqid(); 
$status             = 0; 
$items_array_left_json = null; 
$items_array_rigth_json = null; 
$items_array_stereo_json = null; 




$error = array();



################################################################################
if (!$error) {
    // Agrego la order

    shop_orders_add(
            $via,
            $express,
            $date_delivery,
            $client_ref,
            $address_billing,
            $address_delivery,
            $patient_id,
            $description_json,
            $bac,
            $price,
            $discount,
            $ce,
            $remake,
            $hearing_loss,
            $ear,
            $comments,
            $code,
            $status,
            $items_array_left_json,
            $items_array_rigth_json,
            $items_array_stereo_json
    );
    
    $last_order_id = orders_field_code("id", $code);
    
    vardump($last_order_id); 
    vardump($bac); 
    



    // agrego cada una de las lineas 
    // Cambio de estatus de draf a registrado 
    // pongo los cokkies en nulll

    $_SESSION['order']['id'] = null;
    $_SESSION['order']['patient_id'] = null;
    $_SESSION['order']['date_delivery'] = null;
    $_SESSION['order']['address_delivery'] = null;
    $_SESSION['order']['side'] = null;
    $_SESSION['order']['type_id'] = null;
    $_SESSION['order']['type_id'] = null;
    $_SESSION['order']['forme_id'] = null;
    $_SESSION['order']['material_id'] = null;
    $_SESSION['order']['perte_id'] = null;
    $_SESSION['order']['event_id'] = null;
    $_SESSION['order']['longuer_id'] = null;
    $_SESSION['order']['diametre_id'] = null;
    $_SESSION['order']['constitution_id'] = null;
    $_SESSION['order']['option_id'] = null;



//        // comentario del cliente
//    if($comments){
//        shop_orders_update_comments($order_id, $comments); 
//    } 
//
//    
//    shop_orders_update_status($order_id, $new_status); 
//    

    
    die(); 

    header("Location: index.php?c=shop");
} else {
    include view("home", "pageError");
}
 * 
 */