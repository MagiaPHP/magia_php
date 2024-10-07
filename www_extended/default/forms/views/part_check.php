<?php

$html = '<?php # ' . $fel2->getM_name() . '  ?>
<div class="form-group">
    <label class="control-label col-sm-3" for="m_table">' . $fel2->getM_label() . '</label>
    <div class="col-sm-7">';

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

$html .= '
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
?>
