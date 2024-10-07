<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// si la empresa esta aprobada ya no se puede editar
// y se le redirecciona al inicio
if (contacts_field_id('status', contacts_work_for($u_id)) != 0) {
    header("Location: index.php?c=shop");
    die();
}

include view("shop", "a");
