<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


if (!$_SESSION['u_expense']) {
    header("Location: index.php?c=expenses&a=add");
}

header("Location: index.php?c=expenses&a=add_70");
