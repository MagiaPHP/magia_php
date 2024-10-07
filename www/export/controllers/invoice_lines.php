<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$invoice_id = (isset($_REQUEST["invoice_id"]) && isset($_REQUEST["invoice_id"]) != "") ? clean($_REQUEST["invoice_id"]) : false;

$invoices_lines = null;
$invoices_lines = invoices_export($invoice_id);

//vardump(count($invoices_lines));
//die();

$lignes = [];

$i = 0;

$office = 'null';
$l = null;
//
$total_htva = 0;
$total_discounts = 0;
$subtotal = 0;
$total_pvp = 0;
//
//
//


foreach ($invoices_lines as $lines) {

    if ($lines['office'] != null && $lines['office'] != '') {
        $l = $lines['office'];
    }

    $price = $lines['price'];
    $total = $lines['quantity'] * $price;
    $discount = $lines['discounts'];
    $discount_v = ($lines['discounts'] > 0 ) ? ($total * $lines['discounts'] ) / 100 : 0;
    $htva = $total - $discount_v;
    $tax = $lines['tax'];
    $tax_v = ($lines['tax'] > 0) ? ($htva * $lines['tax']) / 100 : 0;
    $tvac = $htva + $tax_v;

    // SEGUN PEDIDO DE 
    //****************************************
    $lignes[$i] = array(
        $lines['date'], //a
        $lines['id'], // b
        $lines['client_id'], //c
        $lines['client'], //d
        $lines['code'], //e
        $lines['description'], //f
        $lines['quantity'], //g
        str_replace('.', ',', $price),
        str_replace('.', ',', $total),
        str_replace('.', ',', $discount),
        str_replace('.', ',', $discount_v),
        str_replace('.', ',', $htva),
        str_replace('.', ',', $tax),
        str_replace('.', ',', $tax_v),
        str_replace('.', ',', $tvac),
        $lines['barrio'], // N
        $lines['address'],
        $l, // oficina
    );

    /**
      'Quantite', // G
      'Price', // H
      'Total', // I
      'Reduction %', // J
      'Reduction valeur', // J
      'Htva', // J
      'Tax %', // J
      'Tax valeur', // J
      'Tvac', // J
      '', // J
     */
    //***************************************

    $i++;
}

################################################################################
if (!$error) {


    include view("export", "invoice_lines");
    //
    //
} else {
    include view("home", "pageError");
}
