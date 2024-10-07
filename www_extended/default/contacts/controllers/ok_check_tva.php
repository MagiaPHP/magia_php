<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


/**
 * Esto pone los numeros de tva con el formato correcto 
 * 
 */
$contacts_list = contacts_list();

foreach ($contacts_list as $key => $contact) {
    if (($contact['tva']) && ($contact['tva'] != tva_formated($contact['tva']))) {
        contacts_update_tva($contact['id'], tva_formated($contact['tva']));
    }
}


header("Location: index.php?c=contacts");
