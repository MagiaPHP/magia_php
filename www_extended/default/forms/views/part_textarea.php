<?php

$html = '    <?php # ' . $fel2->getM_name() . '  ?>
<div class="form-group">
    <label class="control-label col-sm-3" for="m_table">' . $fel2->getM_label() . '</label>
    <div class="col-sm-7">
               
        <textarea 
        class="' . $fel2->getM_class() . '" 
        name="' . $fel2->getM_name() . '" 
        rows="3"
        placeholder ="' . $fel2->getM_placeholder() . '"
        ' . $mandatory . '    
        ' . $disabled . '
        ' . $readonly . '  
  
></textarea>
            
    </div>	
    
    <div class="col-sm-1">    
        <a href="index.php?c=forms&a=edit&id=' . $fel2->getForm_id() . '&line=' . $fel2->getId() . '">
            <span class="glyphicon glyphicon-pencil"></span> ' . _tr("Edit") . '            
        </a>
    </div>
    
</div>
<?php # /' . $fel2->getM_name() . ' ?>';
?>

