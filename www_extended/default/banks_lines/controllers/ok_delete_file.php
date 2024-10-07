<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$file = (isset($_GET["file"]) && $_GET["file"] != "" ) ? clean($_GET["file"]) : false;
$redi = (isset($_GET["redi"]) && $_GET["redi"] != "" ) ? ($_GET["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$file) {
    array_push($error, 'Operation is mandatory');
}
###############################################################################
# FORMAT
# solo letras y numeros, nada de / o anti \
# debe existir en el temporal 
# debe tener las extenciones requeridas
# 
###############################################################################
$file_to_delete = "www/gallery/img/_" . $config_db . "/" . $file;

if (!file_exists($file_to_delete)) {
    array_push($error, 'File does not exist');
}
###############################################################################
# CONDITIONAL
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################


if (!$error) {

    unlink($file_to_delete);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=banks_lines");
            break;

        case 2:
            header("Location: index.php?c=banks_lines&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=banks_lines&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=banks_lines&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            header("Location: index.phpc=xxx&a=yyy");
            break;

        case 6:
            header("Location: index.php?c=banks_lines&a=import");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


