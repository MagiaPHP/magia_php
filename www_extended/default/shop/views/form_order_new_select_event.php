<?php

function order_new_form_events($type_id, $s, $actual_id) {
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
    foreach (_type_event_list_by_type($type_id) as $key => $value) {
        $event = events_field_id('event', $value['event_id']);

        $checked = ($value['event_id'] == $actual_id || count(_type_event_list_by_type($type_id)) == 1) ? " checked " : "";

        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="event_id[' . $s . ']" class="event_id_' . $s . '"  id="event_id[' . $s . ']"   value="' . $value['event_id'] . '" ' . $checked . ' required onchange="changeSrc()">
                        ' . _tr($event) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

?>