<?php

function order_new_form_ecouteurs($typeMarque_id, $s, $actual_id) {
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
    foreach (_types_marques_ecouteur_list_by_typeMarque_id($typeMarque_id) as $key => $value) {
        $ecouteur = ecouteurs_field_id('ecouteur', $value['ecouteur_id']);

        $checked = ($value['ecouteur_id'] == $actual_id || count(_types_marques_ecouteur_list_by_typeMarque_id($typeMarque_id)) == 1 ) ? " checked " : "";

        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="ecouteur_id[' . $s . ']" class="ecouteur_id_' . $s . '" id="ecouteur_id[' . $s . ']" value="' . $value['ecouteur_id'] . '" ' . $checked . ' required onchange="changeSrc()">
                        ' . _tr($ecouteur) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

?>