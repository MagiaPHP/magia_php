<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Hace una copia de un pedido con la posibilidad de cambiar lados y cantidades
 */
$id = (!empty($_POST['id'])) ? clean($_POST['id']) : null;
$discount = (!empty($_POST['discount']) ) ? clean($_POST['discount']) : 0;
$date_delivery = (!empty($_POST['date_delivery'])) ? clean($_POST['date_delivery']) : null;
$delivery_days = (!empty($_POST['delivery_days'])) ? clean($_POST['delivery_days']) : null;
$client_ref = (!empty($_POST['client_ref'])) ? clean($_POST['client_ref']) : null;
//
$quantity_side_l = (!empty($_POST['quantity_side_l'])) ? clean($_POST['quantity_side_l']) : null;
$quantity_side_r = (!empty($_POST['quantity_side_r'])) ? clean($_POST['quantity_side_r']) : null;
//
$address_delivery = orders_field_id("address_delivery", $id);
$address_billing = orders_field_id("address_billing", $id);
//
//
$patient_id = orders_field_id("patient_id", $id);
$description = orders_field_id("description", $id);
//
$side = orders_field_id("side", $id);
$via = orders_field_id("via", $id);
//
$express = null;
$status = 10;
$remake = null; // ya q es una copia
$hearring_loss = null;
$ear = null;

$remake_motif = (!empty($_POST['remake_motif'])) ? ($_POST['remake_motif']) : null;

$comments = (!empty($_POST['comments'])) ? clean($_POST['comments']) : null;

// remake_motif 
// 
//
//$orderStatusDefault = _options_option("orderStatusDefault") ;
$orderStatusDefault = 10;

$items_array_left_json = orders_lines_field_id_by_side("description", $id, "L");
$items_array_rigth_json = orders_lines_field_id_by_side("description", $id, "R");
$items_array_stereo_json = orders_lines_field_id_by_side("description", $id, "S");

$code = magia_uniqid();

$error = array();

################################################################################
# Requeridos
if (!$id) {
    array_push($error, '$id is mandatory');
}
if (!$side) {
    array_push($error, '$side is mandatory');
}
if ($side == 'L' && ($quantity_side_l < 1 || $quantity_side_l > 5 )) {
    array_push($error, '$side_l quantity is mandatory');
}
if ($side == 'R' && ($quantity_side_r < 1 || $quantity_side_r > 5 )) {
    array_push($error, '$side_r quantity is mandatory');
}
if ($side == 'S' && (!$quantity_side_r && !$quantity_side_l )) {
    array_push($error, 'In stereo side, left or right side is mandatory');
}


###############################################################################
###############################################################################
// lista de los bacs libres
$bacs = bacs_free_list();
// cojo el primero, si hay lo pongo sino paso nulo
$bac_free = ( $bacs != null) ? $bacs[0]['name'] : _options_option("MasterBac");

if (!$bac_free) {
    array_push($error, 'There is not bac free, please contact the administrator');
}

#************************************************************************
#
# Verificar si 
# - Si el cliente no esta desactivo
# - ese paciente pertenece al que dice ser
# - si la referencia del cliente no ha sido ya usada
# - si hay direccion de delivery
# - 
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {


    shop_orders_add_copy(
            $side,
            $delivery_days,
            $date_delivery,
            $address_billing,
            $address_delivery,
            $patient_id,
            $bac_free,
            $remake,
            $discount,
            $comments,
            $code,
            $status
    );

    $last_order_id = orders_field_code('id', $code);

    // actualizamos el lado 
    if ($quantity_side_l && $quantity_side_r) {
        // stereo
        orders_update_side($last_order_id, "S");
    } elseif ($quantity_side_l && !$quantity_side_r) {
        // izquier
        orders_update_side($last_order_id, "L");
    } else {
        //  dercha
        orders_update_side($last_order_id, "R");
    }

    // Agrego un comentario 
    comments_add(null, $u_id, 'orders', $last_order_id, "It is a copy of order $id", 1, 1);
    //
    ############################################################################
    ############################################################################
    ############################################################################
    // $id = $order_id;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Make Copy ($last_order_id) from order ($id)";
    $doc_id = $last_order_id;
    $crud = "create";
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
    //
    // el master bac nunca llega numero de identificdor        
    bacs_add_order($last_order_id, $bac_free);

    // actualizo la fecha de entrega o los dias 

    if ($date_delivery) {
        // actualizo fecha         
        shop_order_update_date_delivery($last_order_id, $date_delivery);
    } else {
        // sino hay fecha solo los dias 
        shop_order_update_delivery_days($last_order_id, $delivery_days);
    }

    // copia de ficheros STL
    //
    foreach (orders_files_list_order_id($id) as $key => $value) {

        orders_files_add(
                date("Y-m-d"),
                $last_order_id, $value['owner_id'], $value['side'], $value['description'],
                $value['notes'], $value['file'], $value['type'], $value['code'], 1);
    }







    if ($last_order_id) {



        if ($quantity_side_l) {
            shop_order_copy_lines_for_copy($id, $last_order_id, 'L', $quantity_side_l);
        }


        if ($quantity_side_r) {
            shop_order_copy_lines_for_copy($id, $last_order_id, 'R', $quantity_side_r);
        }


        header("Location: index.php?c=shop&a=orderDetails&id=$last_order_id");
    } else {
        array_push($error, 'Your order could not be registered, send it by email please');
        ///FATAL ERROR///FATAL ERROR///FATAL ERROR///FATAL ERROR///FATAL ERROR
        include view("home", "pageError");
    }
} else {


    include view("home", "pageError");
}    