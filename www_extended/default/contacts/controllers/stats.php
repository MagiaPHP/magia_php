<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$contacts['all'] = contacts_total_by_type();
$contacts['1'] = contacts_total_by_type(1);
$contacts['0'] = $contacts['all'] - $contacts['1'];

$contacts['totals']['by_tva'] = contacts_total_with_tva();

include view("contacts", "page_stats");
