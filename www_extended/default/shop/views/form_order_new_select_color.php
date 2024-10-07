<?php

function order_new_form_colors($tmf_id, $material_id, $s, $actual_id) {
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
    foreach (_tmf_materials_colours_by_tmf_material_id($tmf_id, $material_id) as $key => $value) {
        $colour = couleurs_field_id('colour', $value['colour_id']);

        $checked = ($value['colour_id'] == $actual_id || count(_tmf_materials_colours_by_tmf_material_id($tmf_id, $material_id)) == 1 ) ? " checked " : "";

        $html .= '<div class="form-group">
        <div class="col-sm-offset-0 col-sm-12">
            <div class="radio">
                <label>
                    <input type="radio" name="colour_id[' . $s . ']" class="colour_id_' . $s . '" id="colour_id[' . $s . ']" value="' . $value['colour_id'] . '" ' . $checked . '  required onchange="changeSrc()">
                        ' . _tr($colour) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

?>