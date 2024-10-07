<?php

function order_new_form_con($type_id, $s, $actual_id = null) {
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
    foreach (_types_constitution_list_by_type($type_id) as $key => $value) {
        $constitution = constitution_field_id('constitution', $value['constitution_id']);

        $checked = ($value['constitution_id'] == $actual_id || count(_types_constitution_list_by_type($type_id)) == 1 ) ? " checked " : "";

        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="constitution_id[' . $s . ']" class="constitution_id_' . $s . '" id="constitution_id[' . $s . ']" value="' . $value['constitution_id'] . '" ' . $checked . ' required onchange="changeSrc()">
                        ' . _tr($constitution) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

?>