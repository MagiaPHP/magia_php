99999
<?php
vardump($u_id);
$i = 45;
foreach (emails_search_by_u_id($u_id) as $id => $mensaje) {
    include "izq_items.php";
}
?>
