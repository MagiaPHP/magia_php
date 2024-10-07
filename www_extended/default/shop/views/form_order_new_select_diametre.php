<?php

function order_new_form_diametre($event_id, $s, $actual_id) {
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
    foreach (_event_diametre_list_by_event($event_id) as $key => $value) {
        $diametre = diametre_field_id('diametre', $value['diametre_id']);

        $checked = ($value['diametre_id'] == $actual_id || count(_event_diametre_list_by_event($event_id)) == 1 ) ? " checked " : "";

        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="diametre_id[' . $s . ']" class="diametre_id_' . $s . '" id="diametre_id[' . $s . ']"  value="' . $value['diametre_id'] . '" ' . $checked . ' required onchange="changeSrc()">
                        ' . _tr($diametre) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

?>