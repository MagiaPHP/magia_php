<?php

function order_new_form_formes($type_id, $s, $modele_id = null, $id_selected = "") {
    switch ($s) {
        case "L":
            $side = "Left";
            break;
        case "R":
            $side = "Right";
            break;
        // Solo puede haber L, R  como lado         
        default:
            $side = "??????";
            break;
    }
// HTML-------------------------------------------------------------------------    
    $html = "<h3>" . _tr($side) . "</h3>";

    if ($modele_id) {
        $formes_array = _types_modeles_formes_search_by_type_modele($type_id, $modele_id);
    } else {
        $formes_array = _types_modeles_formes_search_forme_by_type_id($type_id);
    }



    foreach ($formes_array as $key => $value) {
        $forme = formes_field_id('forme', $value['forme_id']);

        $checked = ($id_selected == $value['forme_id'] || count($formes_array) == 1) ? " checked " : "";

        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="forme_id[' . $s . ']" class="forme_id_' . $s . '"  id="forme_id[' . $s . ']" value="' . $value['forme_id'] . '"  ' . $checked . ' required="" onchange="changeSrc()">
                        ' . _tr($forme) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}
?>

