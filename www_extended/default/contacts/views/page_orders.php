<?php include view("contacts", "page_header"); ?> 

<?php include "nav_orders.php"; ?>

<?php

if ($orders_list) {
    include "table_orders.php";
} else {
    message('info', 'No items');
}
?>

<?php include view("contacts", "page_footer"); ?>  