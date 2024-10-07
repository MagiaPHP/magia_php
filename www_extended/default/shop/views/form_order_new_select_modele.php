<?php

function order_new_form_modeles($type_id, $s, $modele_id_actual = null) {
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
    foreach (_types_modeles_formes_search_modele_by_type_id($type_id) as $key => $value) {

        $total = count(_types_modeles_formes_search_modele_by_type_id($type_id));

        $checked = ($value['modele_id'] == $modele_id_actual || $total == 1 ) ? " checked " : "";

        $type = modeles_field_id('modele', $value['modele_id']);
        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="modele_id[' . $s . ']" class="modele_id_' . $s . '" id="modele_id[' . $s . ']" value="' . $value['modele_id'] . '" ' . $checked . ' required onchange="changeSrc()">
                        ' . _tr($type) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

?>  