<?php

if (!permissions_has_permission($u_rol, 'shop_patients', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

include view("shop", "patients_new");
