<?php

function order_new_form_marques($type_id, $s, $actual_id = null) {
    switch ($s) {
        case "L":
            $side = "Left";
            break;
        case "R":
            $side = "Right";
            break;
        // Solo puede haber L, R  como lado         
        default:
            $side = "Stereo";
            break;
    }
// HTML-------------------------------------------------------------------------    
    $html = "<h3>" . _tr($side) . "</h3>";
    foreach (_types_marques_list_by_type($type_id) as $key => $value) {
        $marque = marques_field_id('marque', $value['marque_id']);

        $checked = ($value['marque_id'] == $actual_id || count(_types_marques_list_by_type($type_id)) == 1 ) ? " checked " : "";

        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="marque_id[' . $s . ']" class="marque_id_' . $s . '"  id="marque_id[' . $s . ']"   value="' . $value['marque_id'] . '" ' . $checked . ' required onchange="changeSrc()">
                        ' . _tr($marque) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

?>