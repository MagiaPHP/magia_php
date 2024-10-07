<?php

function order_new_form_types($s, $type_id_actual = null) {
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
    //$html = "<h3>" . _tr($side) . "</h3>";
    $html = "";
    foreach (types_list() as $key => $value) {

        $checked = ($value['id'] == $type_id_actual ) ? " checked " : "";

        //$type = modeles_field_id('modele', $value['modele_id']);

        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="type_id" id="type_id" value="' . $value['id'] . '" ' . $checked . ' required="" onClick="changeSrcTypes()"  >
                        ' . _tr($value['type']) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}
?>


