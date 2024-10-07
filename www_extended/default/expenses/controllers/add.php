<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}




if (count(providers_list()) > 0) {

    include view("expenses", "add");
    
} else {


    header("Location: index.php?c=expenses&a=add_provider");
}



