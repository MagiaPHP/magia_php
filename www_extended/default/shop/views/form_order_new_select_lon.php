<?php

function order_new_form_lon($type_id, $s, $actual_id = null) {
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
    foreach (_type_longuer_conduit_list_by_type($type_id) as $key => $value) {
        $longueur = longueurs_field_id('longueur', $value['longuer_id']);

        $checked = ($value['longuer_id'] == $actual_id || count(_type_longuer_conduit_list_by_type($type_id)) == 1 ) ? " checked " : "";

        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-12">
            <div class="radio">
                <label>
                    <input type="radio" name="longuer_id[' . $s . ']" class="longuer_id_' . $s . '"  id="longuer_id[' . $s . ']"   value="' . $value['longuer_id'] . '" ' . $checked . ' required onchange="changeSrc()">
                        ' . _tr($longueur) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

?>