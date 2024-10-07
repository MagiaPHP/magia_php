<?php

$html = '<?php # ' . $m_field['m_name'] . '  ?>
<div class="form-group">
    <label class="control-label col-sm-3" for="m_table">' . $m_field["m_label"] . '</label>
    <div class="col-sm-7">
               
        <select class="' . $m_field["m_class"] . '" name:"' . $m_field["m_name"] . '">';
$html .= '<option value="null">' . _tr("Select one") . '</option>';

foreach (forms_select_table_col($fle2->getM_table_external(), $fle2->getM_col_external()) as $key => $value) {
    $html .= '<option value="1">' . $value[0] . '</option>';
}

$html .= '</select>
            
    </div>	
    
    <div class="col-sm-1">    
        <a href="index.php?c=forms&a=edit&id=' . $id . '&line=' . $m_field["id"] . '">
            <span class="glyphicon glyphicon-pencil"></span> ' . _tr("Edit") . ' 
        </a>
    </div>
    
</div>
<?php # /' . $m_field['m_name'] . ' ?>';
//vardump($fl);
//vardump($fle2->getM_table_external());
//vardump($fle2->getM_col_external());
//
//vardump(forms_select_table_col($fle2->getM_table_external(), $fle2->getM_col_external()));
?>
