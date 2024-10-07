<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $docs_exchange = new Docs_exchange();
    $docs_exchange->setDocs_exchange($id);

    include view("docs_exchange", "export_json");
} else {
    include view("home", "pageError");
}    
