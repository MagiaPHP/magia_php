

<form class="form-horizontal" >

    <?php
    $html = '';
    foreach ($forms2->getLines() as $key => $line) {

        $fel2 = new Forms_lines2();
        $fel2->setForms_lines($line['id']);

        $mandatory = (1 == 2 ) ? " required " : "";
        $disabled = (1 == 2 ) ? " disabled " : "";
        $readonly = (1 == 2 ) ? " readonly " : "";

        if ($fel2->getM_type() == 'hidden') {
            $html .= '<type="hidden" name="' . $fel2->getM_name() . '" value="' . $fel2->getM_value() . '">';
            break;
        }

        $html .= '<?php # ' . $fel2->getM_name() . '  ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="m_table">' . $fel2->getM_label() . '</label>
            <div class="col-sm-7">';

        switch ($fel2->getM_type()) {
            case 'text':
            case 'email':
            case 'date':
                $html .= '        <input 
                type="' . $fel2->getM_type() . '" 
                name="' . $fel2->getM_name() . '" 
                class="' . $fel2->getM_class() . '" 
                id="' . $fel2->getM_id() . '" 
                placeholder="' . $fel2->getM_placeholder() . '" 
                value="' . $fel2->getM_value() . '"
                >';
                break;

            case 'textarea':
                $html .= '<textarea 
                    class="' . $fel2->getM_class() . '" 
                    name="' . $fel2->getM_name() . '" 
                    rows="3"
                    placeholder ="' . $fel2->getM_placeholder() . '"
                    ' . $mandatory . '    
                    ' . $disabled . '
                    ' . $readonly . '  
                    ></textarea>';
                break;

            case 'select':
                $html .= '<select class="' . $fel2->getM_class() . '" name="' . $fel2->getM_name() . '">';
                $html .= '<option value="null">' . _tr("Select one") . '</option>';
                foreach (json_decode($fel2->getM_options_values(), true) as $key => $value) {
                    $html .= '<option value="' . $value["value"] . '">' . $value["label"] . '</option>';
                }
                $html .= '';
                $html .= '</select>';
                break;

            case 'radio':
                $html .= '';
                foreach (json_decode($fel2->getM_options_values(), true) as $key => $value) {
                    $html .= '<div class="radio">';
                    $html .= '<label>';
                    $html .= '<input  '
                            . 'type="radio" '
                            . 'name="' . $fel2->getM_name() . '" '
                            . 'id="' . $fel2->getM_name() . '" '
                            . 'value="' . $value['value'] . '" >
                            ' . $value["label"] . '
                            </label>
                        </div>';
                }
                break;

            case 'check':
                $html .= '';

                foreach (json_decode($fel2->getM_options_values(), true) as $key => $value) {
                    $html .= '<div class="checkbox">
                            <label>
                              <input 
                              type="checkbox" 
                              name="' . $fel2->getM_name() . '[]" 
                              id="' . $fel2->getM_name() . '[]" 
                              value="' . $value['value'] . '" 

                                  >
                              ' . $value["label"] . '
                            </label>
                          </div>';
                }
                $html .= '';
                break;
            default:
                break;
        }

        $html .= '    </div>	
    
</div>
<?php # /' . $fel2->getM_name() . ' ?>';

        echo $html;
//
//
//
//
//
//
//
//
//
//
//
//
//        echo '<div class = "form-group">';
//        echo '<label for = "' . $fil2->getM_name() . '">' . _t($fil2->getM_name()) . '</label>';
//        echo '<input '
//        . 'type = "' . $fil2->getM_type() . '" '
//        . 'class = "' . $fil2->getM_class() . '" '
//        . 'id = "' . $fil2->getM_id() . '" '
//        . 'placeholder = "' . $fil2->getM_placeholder() . '" '
//        . 'value = "11111" '
//        . ' ' . $required . ' '
//        . ' ' . $disabled . ' '
//        . ' ' . $readonly . ' '
//        . '>';
//        echo '</div>';
//        
    }
    ?>
</form>

