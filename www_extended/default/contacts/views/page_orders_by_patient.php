<?php include view("contacts", "page_header"); ?> 

<?php include view("contacts", "nav_orders_patient"); ?>  

<?php

if ($orders) {
    echo "<h3>" . contacts_formated($id) . "</h3>";
    include 'page_table_patient_orders.php';
    //include view('orders', 'table_index');
} else {
    message('info', "No items");
}
?>

<?php include view("contacts", "page_footer"); ?>  

