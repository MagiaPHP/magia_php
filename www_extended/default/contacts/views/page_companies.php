<?php include view("contacts", "page_header"); ?>  

<?php include "nav.php"; ?>

<?php

if ($companies) {
    include "table_companies.php";
} else {
    message('info', 'No items');
}
?>

<?php include view("contacts", "page_footer"); ?>  

