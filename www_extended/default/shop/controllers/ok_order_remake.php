<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//echo "1"; 
//die();
$id = (!empty($_POST['id'])) ? clean($_POST['id']) : null;
$via = orders_field_id("via", $id);
$express = null;
$discount = ( ($_POST['discount']) != "" ) ? clean($_POST['discount']) : 0;
$date_delivery = (!empty($_POST['date_delivery'])) ? clean($_POST['date_delivery']) : null;
$delivery_days = (!empty($_POST['delivery_days'])) ? clean($_POST['delivery_days']) : null;
//
$quantity_side_l = (!empty($_POST['quantity_side_l'])) ? clean($_POST['quantity_side_l']) : null;
$quantity_side_r = (!empty($_POST['quantity_side_r'])) ? clean($_POST['quantity_side_r']) : null;
//
$client_ref = (!empty($_POST['client_ref'])) ? clean($_POST['client_ref']) : null;

$address_delivery = orders_field_id("address_delivery", $id);
$address_billing = orders_field_id("address_billing", $id);
$patient_id = orders_field_id("patient_id", $id);
$description = orders_field_id("description", $id);
$side = orders_field_id("side", $id);
$status = 10;
$remake = $id;
$hearring_loss = null;
$ear = null;

$remake_motif = (!empty($_POST['remake_motif'])) ? ($_POST['remake_motif']) : null;

$comments = (!empty($_POST['comments'])) ? clean($_POST['comments']) : null;

$moldes = (!empty($_POST['moldes'])) ? clean($_POST['moldes']) : null;

$comment_molde = ($moldes === 'old') ? "Yes, use the old molds" : "Wait, I'm going to send new molds";

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

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

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
// en la sede no se puede hacer ordenes
if (offices_is_headoffice(contacts_work_at($u_id))) {
    // array_push($error , "The headoffice can not make order") ;
}
// si hay 3 o mas remake, error 
//------------------------------------------------------------------------------
if (orders_total_remake_by_order($id) >= 3) {
    array_push($error, "You can make max three remakes of this order");
}

if (orders_field_id("remake", $id) != null) {
    array_push($error, "You can't do a remake of a remake");
}

###############################################################################
// lista de los bacs libres
$bacs = bacs_free_list();
// cojo el primero, si hay lo pongo sino paso nulo
$bac_free = ( $bacs != null) ? $bacs[0]['name'] : _options_option("MasterBac");

if (!$bac_free) {
    array_push($error, 'There is not bac free, please contact the administrator');
}

#************************************************************************


if ($client_ref && orders_client_ref_exist($u_owner_id, $client_ref)) {
    array_push($error, "The reference exist");
}
#
# Verificar si 
# - Si el cliente no esta desactivo
# - ese paciente pertenece al que dice ser
# - si la referencia del cliente no ha sido ya usada
# - si hay direccion de delivery
# - 
# 
# 
//vardump($discount);
//vardump($_POST);
//die(); 
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {


    shop_orders_add_remake(
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

    // moldes 
    // agrego un comentarios

    if ($debug) {
        echo "<p>last_order_id : $last_order_id</p>";
    }




    comments_add(null, $u_id, "orders", $last_order_id, $comment_molde, 1, 1);

    if ($debug) {
        echo "<p>last_order_id : $last_order_id</p>";
    }





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


    if ($debug) {
        echo "<p>quantity_side_l : $quantity_side_l</p>";
        echo "<p>quantity_side_r : $quantity_side_r</p>";
    }



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



    if ($debug) {
        echo "<p>date_delivery : $date_delivery</p>";
        echo "<p>delivery_days : $delivery_days</p>";
    }




    // copia de ficheros      
    // vardump(orders_files_list_order_id($id)); 


    foreach (orders_files_list_order_id($id) as $key => $value) {

        orders_files_add(
                date("Y-m-d"),
                $last_order_id, $value['owner_id'], $value['side'], $value['description'],
                $value['notes'], $value['file'], $value['type'], $value['code'], 1);

        if ($debug) {
            echo "<p>Copy files to new order: $last_order_id</p>";
        }
    }







    if ($last_order_id) {

        if ($quantity_side_l) {
            orders_order_copy_lines_for_copy($id, $last_order_id, 'L', $quantity_side_l);
        }


        if ($quantity_side_r) {
            orders_order_copy_lines_for_copy($id, $last_order_id, 'R', $quantity_side_r);
        }

        foreach ($remake_motif as $key => $motif_id) {
            // copio los motivos del remake 
            //remake_motifs_add($motif, $description, $order_by, $status); 
            orders_remake_add($last_order_id, $motif_id);
            //  vardump(array($last_order_id, $motif_id)); 
        }


//        shop_order_copy_lines_for_remake($id, $last_order_id);
//
//
//        foreach ($remake_motif as $key => $motif_id) {
//            // copio los motivos del remake 
//            //remake_motifs_add($motif, $description, $order_by, $status); 
//
//            orders_remake_add($last_order_id, $motif_id);
//
//            //  vardump(array($last_order_id, $motif_id)); 
//        }
        ############################################################################
        #### Registra en ORDER #####################################################
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
        $description = "User add a remake [ $last_order_id ] from order [ $id ]";
        $doc_id = $id;
        $crud = "create";
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
        ############################################################################
        ### REGISTRA EN REMAKE #####################################################
        ############################################################################
        $data = json_encode(array(
            $last_order_id
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
        $description = "User add this remake [ $last_order_id ] from order [ $id ]";
        $doc_id = $last_order_id;
        $crud = "create";
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
        header("Location: index.php?c=shop&a=orderDetails&id=$last_order_id");
    } else {
        array_push($error, 'Your order could not be registered, send it by email please');
        ///FATAL ERROR///FATAL ERROR///FATAL ERROR///FATAL ERROR///FATAL ERROR
        include view("home", "pageError");
    }
} else {


    include view("home", "pageError");
}