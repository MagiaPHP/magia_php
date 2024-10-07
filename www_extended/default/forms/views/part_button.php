<?php

$html = '<?php # m_table  ?>
 <div class="form-group">
    <div class="col-sm-offset-3 col-sm-7">
      <button type="submit" class="' . $m_field['m_class'] . '">' . $m_field['m_label'] . '</button>
    </div>
    
  <div class="col-sm-1">    
        <a href="index.php?c=forms&a=edit&id=' . $id . '&line=' . $m_field["id"] . '">Edit</a>
    </div>
    
    
  </div>
<?php # /m_table ?>';
?>