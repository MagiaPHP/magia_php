<?php

die("Disabled");
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//include "www/addresses_transport/views/search_advanced.php";
include view("addresses_transport", "search_advanced");
