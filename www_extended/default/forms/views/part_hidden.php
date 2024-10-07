<?php

$html = '<?php # ' . $fel2->getM_name() . '  ?>
<div class="form-group">
    <label class="control-label col-sm-3" for="m_table"></label>
    <div class="col-sm-7">
               
        <pre>type="hidden" name="' . $fel2->getM_name() . '" value="' . $fel2->getM_value() . '"</pre>
            
    </div>	
    
    <div class="col-sm-1">    
        <a href="index.php?c=forms&a=edit&id=' . $fel2->getForm_id() . '&line=' . $fel2->getId() . '">
        <span class="glyphicon glyphicon-pencil"></span> ' . _tr("Edit") . '</a>
    </div>
    
</div>
<?php # /' . $fel2->getM_name() . ' ?>';
?>

