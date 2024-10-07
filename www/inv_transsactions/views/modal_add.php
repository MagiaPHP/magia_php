<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 
?>


<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#inv_transsactions_add_<?php echo $inv_transsactions_item["id"]; ?>">
    <?php echo icon("plus"); ?>
    <?php _t("Add new"); ?>
</button>


<div class="modal fade" id="inv_transsactions_add_<?php echo $inv_transsactions_item["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="inv_transsactions_add_<?php echo $inv_transsactions_item["id"]; ?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="inv_transsactions_add_<?php echo $inv_transsactions_item["id"]; ?>Label"> <?php _t("Add"); ?></h4>
      </div>
      <div class="modal-body">
        <?php 
        $redi = 1;
        include view("inv_transsactions","form_add"   , $arg = ["redi" => 1]); 
        $redi = "";     
        ?>
      </div>
      

      
    </div>
  </div>
</div>


