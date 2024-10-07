<?php

/*
  if (!permissions_has_permission($u_rol, $c, "create")) {
  header("Location: index.php?c=home&a=no_access");
  die("Error has permission ");
  }

  $order_id = (isset($_REQUEST['order_id'])) ? clean($_REQUEST['order_id']) : false;
  $side = (isset($_REQUEST['side'])) ? clean($_REQUEST['side']) : false;
  $description = "Labo-$side" . "-$order_id";
  $notes = (isset($_REQUEST['notes'])) ? clean($_REQUEST['notes']) : null;
  $file = (isset($_REQUEST['file'])) ? clean($_REQUEST['file']) : false;
  //$type = (isset($_REQUEST['type'])) ? clean($_REQUEST['type']) : false;
  //$type = "scan";
  $type = orders_field_id('via', $order_id);
  $uniqueId = orders_files_uniqid();


  $error = array();
  ################################################################################
  if (!$order_id) {
  array_push($error, "order_id Don't send");
  }
  if (!$u_owner_id) {
  array_push($error, "owner_id Don't send");
  }
  if (!$file) {
  array_push($error, "file Don't send");
  }

  if (!$error) {
  // orders_change_status($id, 30) ;
  orders_files_add(intval($order_id), intval($u_owner_id), $side, $description, $notes, $file, $type, $uniqueId);
  header("Location: index.php?c=shop&a=orderDetails&id=$order_id");
  }
  include view("home", "pageError");
  foreach ($error as $key => $value) {
  echo "$key - $value";
  } */
echo __FILE__;
