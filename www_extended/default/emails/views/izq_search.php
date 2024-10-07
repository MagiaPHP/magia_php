<?php

$i = 45;
foreach (emails_search_by_folder_reciver($folder, $reciver_id) as $id => $mensaje) {

//    include "izq_items.php";
    include "tmp_izq_email.php";
}
?>
