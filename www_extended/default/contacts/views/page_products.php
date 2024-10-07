<?php include view("contacts", "page_header"); ?>  

<?php include "nav_products.php"; ?>       

<?php

if ($products) {
    include "table_contacts_products.php";
} else {
    message('info', 'No items');
}
?>

<?php include view("contacts", "page_footer"); ?>  

