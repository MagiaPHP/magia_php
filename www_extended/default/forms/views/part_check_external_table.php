<?php

$html = '<?php # ' . $fel2->getM_name() . '  ?>
<div class="form-group">
    <label class="control-label col-sm-3" for="m_table">' . $fel2->getM_label() . ' (table)</label>
    <div class="col-sm-7">';

foreach (forms_select_cols_from_table($fel2->getM_table_external()) as $key => $cols) {

    $html .= '<div class="checkbox">
        <label>
          <input 
          type="checkbox" 
          name="' . $fel2->getM_name() . '[]" 
          id="' . $fel2->getM_name() . '[]" 
          value="' . $cols[$fel2->getM_col_external()] . '" 
          
              >
          ' . $cols[$fel2->getM_label_external()] . '
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
?>
