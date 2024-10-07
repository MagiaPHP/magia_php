<?php

function order_new_form_options($tmf_id, $material_id, $s, $option_ids = array()) {
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
    foreach (_tmf_materials_options_by_tmf_material_id($tmf_id, $material_id) as $key => $value) {
        $option = options_field_id('option', $value['option_id']);

        $checked = '';

        if ($option_ids) {
            $checked = (in_array($value['option_id'], $option_ids)) ? ' checked ' : '';
        }





        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="option_id[' . $s . '][]"     id="option_id[' . $s . ']"  value="' . $value['option_id'] . '"  ' . $checked . ' >
                        ' . _tr($option) . '  
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}
?>

