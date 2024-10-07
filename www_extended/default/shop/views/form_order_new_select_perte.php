<?php

function order_new_form_perte($type_id, $s, $actual_id = null) {
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
    foreach (_type_perte_auditive_list_by_type($type_id) as $key => $value) {
        $perte = perte_auditive_field_id('perte', $value['perte_id']);
        $checked = ($value['perte_id'] == $actual_id || count(_type_perte_auditive_list_by_type($type_id)) == 1 ) ? " checked " : "";
        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="perte_id[' . $s . ']"  class="perte_id_' . $s . '"  id="perte_id[' . $s . ']"    value="' . $value['perte_id'] . '" ' . $checked . ' required onchange="changeSrc()">
                        ' . _tr($perte) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

?>