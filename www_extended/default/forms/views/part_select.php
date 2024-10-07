<?php

$html = '<?php # ' . $fel2->getM_name() . '  ?>
   
<div class="form-group">
    <label class="control-label col-sm-3" for="m_table">' . $fel2->getM_label() . ' (table)</label>
    <div class="col-sm-7">
                   
        <select class="' . $fel2->getM_class() . '" name="' . $fel2->getM_name() . '">';

$html .= '<option value="null">' . _tr("Select one") . '</option>';

foreach (json_decode($fel2->getM_options_values(), true) as $key => $value) {

//    $selected = ($m_field['m_col_external'] == $value[$m_field['m_col_external']]) ? " selected " : "";

    $html .= '<option value="' . $value["value"] . '">' . $value["label"] . '</option>';
}

$html .= '';

$html .= '</select>
    </div>	
 
    <div class="col-sm-1">    
        <a href="index.php?c=forms&a=edit&id=' . $fel2->getForm_id() . '&line=' . $fel2->getId() . '">
            <span class="glyphicon glyphicon-pencil"></span> ' . _tr("Edit") . ' 
        </a>
    </div>
    
</div>
<?php # /' . $fel2->getM_name() . ' ?>';
//vardump($fl);
//vardump($fle2->getM_table_external());
//vardump($fle2->getM_col_external());
//
//vardump(forms_select_table_col($fle2->getM_table_external(), $fle2->getM_col_external()));
//vardump($fl);
?>
