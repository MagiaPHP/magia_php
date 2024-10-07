<?php

if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}
// detalles de la order
$order = ($_SESSION['order']) ? $_SESSION['order'] : null;
$patient_id = ($_SESSION['order']['patient_id']) ? $_SESSION['order']['patient_id'] : null;
$date_delivery = ($_SESSION['order']['date_delivery']) ? $_SESSION['order']['date_delivery'] : null;
$delivery_days = ($_SESSION['order']['delivery_days']) ? $_SESSION['order']['delivery_days'] : null;
$address_delivery = ($_SESSION['order']['address_delivery']) ? $_SESSION['order']['address_delivery'] : null;
$side = ($_SESSION['order']['side']) ? $_SESSION['order']['side'] : null;

if ($side == "L") {
    include "order_new_00_L_REG.php";
    $tmf_r_id = null;
    $typeMarque_r_id = null;
}
if ($side == "R") {
    include "order_new_00_R_REG.php";
    $tmf_l_id = null;
    $typeMarque_l_id = null;
}
if ($side == "S") {
    include "order_new_00_L_REG.php";
    include "order_new_00_R_REG.php";
}