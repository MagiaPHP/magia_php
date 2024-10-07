<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 
?>

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#inv_transsactions_edit_">
    <?php echo icon("pencil"); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="inv_transsactions_edit_" tabindex="-1" role="dialog" aria-labelledby="inv_transsactions_edit_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="inv_transsactions_edit_Label"> <?php _t("Edit"); ?></h4>
      </div>
      
      <div class="modal-body">
        <?php include view("inv_transsactions","form_edit"   , $arg = ["redi" => 1]); ?>
      </div>
      

    </div>
  </div>
</div>