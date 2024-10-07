<?php include view("contacts", "page_header"); ?>  

<?php include view("contacts", "nav_permissions"); ?>       


<?php

if ($permissions) {
    //  include "table_contacts_permissions.php";
} else {
    message('info', 'No items');
}
?>

<?php include view("contacts", "page_footer"); ?>  

