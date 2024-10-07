<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
//// valor por defecto 
////$_options["status"] = 1; $modules["id"] =  false ;
//$modules["label"] = false;
//$modules["father"] = false;
//$modules["module"] = false;
//$modules["description"] = false;
//$modules["author"] = false;
//$modules["author_email"] = false;
//$modules["url"] = false;
//$modules["version"] = false;
//$modules["order_by"] = false;
//$modules["status"] = false;



$label = (isset($_GET["label"]) && $_GET["label"] != "" && $_GET["label"] != "null" ) ? clean($_GET["label"]) : false;
$father = (isset($_GET["father"]) && $_GET["father"] != "" && $_GET["father"] != "null" ) ? clean($_GET["father"]) : null;
$module = (isset($_GET["module"]) && $_GET["module"] != "" && $_GET["module"] != "null" ) ? clean($_GET["module"]) : false;

include view("modules", "add");
