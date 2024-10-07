<?php

function order_new_form_mesures($modele_id, $s, $modele_id_actual = null) {
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
    foreach (_modeles_mesures_by_modele_id($modele_id) as $key => $value) {

        $checked = ($value['mesure_id'] == $modele_id_actual || count(_modeles_mesures_by_modele_id($modele_id)) == 1 ) ? " checked " : "";

        $mesure = mesure_snr_field_id("mesure", $value['mesure_id']);
        $html .= '<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="radio">
                <label>
                    <input type="radio" name="mesure_id[' . $s . ']" class="mesure_id_' . $s . '" id="mesure_id[' . $s . ']" value="' . $value['mesure_id'] . '"  ' . $checked . ' required onchange="changeSrc()">
                        ' . _tr($mesure) . '
                </label>
            </div>
        </div>
    </div>';
    }
    echo $html;
}

//******************************************************************************
?>




