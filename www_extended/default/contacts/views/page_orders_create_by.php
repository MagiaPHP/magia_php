<?php include view("contacts", "page_header"); ?> 

<?php include view("contacts", "nav_orders_create_by"); ?>  

<?php

if ($orders) {
    echo "<h3>" . contacts_formated($id) . "</h3>";
    include 'page_table_create_by.php';
} else {
    message('info', "No items");
}
?>

<?php include view("contacts", "page_footer"); ?>  

