<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$ids = (isset($_POST["ids"]) && $_POST["ids"] != "") ? ($_POST["ids"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();

//vardump($ids); 

foreach ($ids as $id => $value) {



    $element = doc_models_lines_details($id);
    //vardump($element);
    //($element['params']);
    //(json_decode($element['params'], true));
    //($cell = json_decode($element['params'], true));
    //$cell['Cell']['hidden'] = 0;
    //vardump($cell);  
    //$data_json = json_encode($cell);
    //vardump($data_json);
    doc_models_lines_update_order_by($id, $value['order_by']);
}




if (!$error) {

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=doc_models&a=edit&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
