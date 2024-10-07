<?php

function doc_models_listxxxxxx() {

    $directory = "www/doc_models/views";
    $res = array();

    $scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
    foreach ($scanned_directory as $archivo) {
        if (is_dir("$directory/$archivo")) {
            //require "$directory/$archivo/_description.php";
            array_push($res, $archivo);
        }
    }

    return $res;
}

function doc_models_generate_cell($cell) {

    include "www_extended/default/doc_models/views/form_cell.php";
}

//function doc_models_update_params($name, $new_data) {
//
//    global $db;
//    $req = $db->prepare(" UPDATE `doc_models` SET `params`=:new_data WHERE name=:name ");
//    $req->execute(array(
//        "name" => $name,
//        "new_data" => $new_data,
//    ));
//}

function doc_models_create_menuxxx($modele, $doc, $section, $id = null) {

    foreach (doc_models_lines_search_modele_doc_section($modele, $doc, $section) as $key => $element) {

        $active = ($id == $element["id"] ) ? " active " : "";

        echo '<a href = "index.php?c=doc_models&a=edit&id=' . $element["id"] . '" class = "list-group-item ' . $active . '">' . $element["order_by"] . '  ' . $element["name"] . '  </a > ';
    }

    echo '
';
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
function doc_models_create_menu($modele, $doc, $section, $id = null) {

    echo '<table class="table table-striped">';

    $icon_hidden = '';
    $icon_fill = '';

    foreach (doc_models_lines_search_modele_doc_section($modele, $doc, $section) as $key => $element) {

        $active = ((int) $id == (int) $element["id"] ) ? ' class="success" ' : "";

        $icon_hidden = (doc_models_lines_get_value_by_key($element, 'hidden'));
        $icon_fill = (doc_models_lines_get_value_by_key($element, 'fill'));

        echo '<tr ' . $active . '>';
        echo '<td>' . $element["order_by"] . '</td>';
        echo '<td>' . $element['element'] . '</td>';
        echo '<td><a href = "index.php?c=doc_models_lines&a=edit&id=' . $element["id"] . '">' . $element["name"] . '</a ></td>';
        echo '<td>' . $icon_hidden . ' ' . $icon_fill . '</td>';
        echo '</tr>';

        $icon = false;
        $icon_hidden = '';
        $icon_fill = '';
    }


    echo '<td>';
    echo '</td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '</table>';
    echo '';

//    echo '<div class="list-group">    ';
//
//    $icon = false;
//    
//    foreach (doc_models_lines_search_modele_doc_section($modele, $doc, $section) as $key => $element) {
//
//        $active = ((int) $id == (int)$element["id"] ) ? " list-group-item-info " : "";
//        
//        
////        $icon = '<spam class="glyphicon glyphicon-eye-close"></spam>';
////        $icon = '<spam class="glyphicon glyphicon-ok"></spam>';
////        
//////        vardump($element);
////        vardump(json_decode($element['params'], true));
//        //vardump(json_decode($element['params'], true)['Cell']['hidden']);
//
//        $icon = (json_decode($element['params'], true)['Cell']['hidden'] == 1 ) ? '<spam class="glyphicon glyphicon-ban-circle"></spam>' : ' ';
//                        
//        echo '<a href = "index.php?c=doc_models&a=edit&id=' . $element["id"] . '" class = "list-group-item ' . $active . '  ">' . $icon . ' <b>' . $element["order_by"] . '</b> ' . $element["name"] . '</a > ';
//
//        $icon = false;
//    }
//
//    echo '
//</div>';
}
