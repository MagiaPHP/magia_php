<?php

$html .= '<a href="#" data-toggle="modal" data-target="#' . $code . '">' . icon('question-sign') . '</a>

<div class="modal fade" id="' . $code . '" tabindex="-1" role="dialog" aria-labelledby="' . $code . 'Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="' . $code . 'Label">
                   ' . _tr("Help") . ' : ' . $controller . '
                </h4>
            </div>
            <div class="modal-body">           
            ';

// buscar todos las acction segun controller y lenguaje
//    foreach (docu_search_by_c_l($controller, $u_language) as $key => $value) {
// si es bloque 
// sino  es bloque
if ($bloc) {
    $lines = docu_search_by_c_a_l_b($controller, $action, $u_language, $bloc);
} else {
    $lines = docu_search_by_c_a_l($controller, $action, $u_language);
}


foreach ($lines as $key => $dsbcal) {

    if (permissions_has_permission($u_rol, 'docu', "update")) {

        $html .= "<h4>$dsbcal[title] <a href='index.php?c=docu&a=edit&id=$dsbcal[id]'>" . _tr('Edit') . "</a> </h4>";
    } else {
        $html .= "<h4>$dsbcal[title] </h4>";
    }

    $html .= "$dsbcal[post]";
}

$html .= '


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">' . _tr("Close") . '</button>
            </div>
        </div>
    </div>
</div>
';

