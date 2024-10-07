<?php

$id_demo = 1;
if (MAGIA_DEBUG) {
    vardump(array(
        'doc' => $doc,
        'id' => $id_demo,
        '$_SERVER["SERVER_NAME"]' => $_SERVER['SERVER_NAME'],
    ));
}

//vardump($element['element']);
//$element = (isset($element['element'])) ?? false;
//
//vardump($element); 
//vardump($element['params']); 
//vardump(json_decode($element['params'], true));

if (isset($element['element'])) {

    include "modal_copy.php";
    include "modal_default.php";
    include "modal_delete_along.php";

    echo "<br>";
    echo "<br>";

    switch ($element['element']) {
        case 'Cell':
            include "part_Cell.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        case 'MultiCell':
            include "part_MultiCell.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        case 'Image':
            include "part_Image.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        case 'QR':
            include "part_QR.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        case 'Line':
            include "part_Line.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        case 'Link':
            include "part_Link.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        case 'Ln':
            include "part_Ln.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        case 'Rect':
            include "part_Rect.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        case 'Text':
            include "part_Text.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        case 'Write':
            include "part_Write.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        case 'AddPage':
            include "part_AddPage.php";
//            include "part_Copy.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;

        default:
            include "part_.php";
//            include "part_Default.php";
//            include "part_Delete.php";
            break;
    }
}
