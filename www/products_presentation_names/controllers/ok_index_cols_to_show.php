<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? ($_REQUEST["redi"]) : false;


$error = array();

if ($data == "") {
    array_push($error, "Data is mandatory");
}

################################################################################
################################################################################
################################################################################
if (!$error) {
    
    _options_push("products_presentation_names_index_cols_to_show", json_encode($data), "products_presentation_names");

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php");
            break;
        
        case 2:
            header("Location: index.php?c=products_presentation_names");
            break;
        
        case 3:
            header("Location: index.php?c=products_presentation_names&a=details&id=" . $redi['id']);
            break;        

        default:
            header("Location: index.php");

            break;
    }
} else {

    include view("home", "pageError");
}







