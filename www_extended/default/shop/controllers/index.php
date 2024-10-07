<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$company = new Company();
$company->setCompany($u_owner_id);
$company->setSubdomain();

switch ($company->getStatus()) {
    case -1: // Bloqueado
        header("Location: index.php?c=shop&a=0");
        break;
    case 0: // wait
        header("Location: index.php?c=shop&a=0");
        break;
    case 0: // actived
//        header("Location: index.php");
        break;

    default:
//        header("Location: index.php");

        break;
}


include view('shop', 'index');
