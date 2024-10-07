<?php

$html = '<?php # ' . $fel2->getM_name() . '  ?>
 <div class="form-group">
    <div class="col-sm-offset-3 col-sm-7">
      <button type="submit" class="' . $fel2->getM_class() . '">' . $fel2->getM_label() . '</button>
    </div>
    
  <div class="col-sm-1">    
        <a href="index.php?c=forms&a=edit&id=' . $fel2->getForm_id() . '&line=' . $fel2->getId() . '">
            <span class="glyphicon glyphicon-pencil"></span> ' . _tr("Edit") . ' 
        </a>
    </div>
    
    
  </div>
<?php # /' . $fel2->getM_name() . ' ?>';
?>