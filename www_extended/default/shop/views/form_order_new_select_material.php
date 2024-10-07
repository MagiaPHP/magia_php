<?php

function order_new_form_materials($tmf_id, $s, $actual_id = null) {
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
    foreach (_tmf_material_search_by_tmf_id($tmf_id) as $key => $value) {

        $checked = ($value['material_id'] == $actual_id || count(_tmf_material_search_by_tmf_id($tmf_id)) == 1 ) ? " checked " : "";

        $material = materials_field_id('material', $value['material_id']);

        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="material_id[' . $s . ']" class="material_id_' . $s . '" id="material_id[' . $s . ']" value="' . $value['material_id'] . '" ' . $checked . ' required onchange="changeSrc()">
                        ' . _tr($material) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

?>