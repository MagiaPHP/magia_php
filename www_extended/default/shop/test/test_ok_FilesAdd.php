
<?php

$order_id = (isset($_POST['order_id'])) ? clean($_POST['order_id']) : false;
$image = (!empty($_FILES['image']) ) ? $_FILES['image'] : false;
$side = (isset($_REQUEST['side'])) ? clean($_REQUEST['side']) : false;
//$description = "$u_owner_id-$side-$order_id";
$notes = (isset($_REQUEST['notes'])) ? clean($_REQUEST['notes']) : null;
$type = orders_field_id('via', $order_id);
$uniqueId = orders_files_uniqid();
