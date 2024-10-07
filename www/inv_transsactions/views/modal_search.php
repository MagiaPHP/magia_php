<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 
?>

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#inv_transsactions_search_">
    <?php echo icon("search");  ?>
    <?php _t("Search"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="inv_transsactions_search_" tabindex="-1" role="dialog" aria-labelledby="inv_transsactions_search_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="inv_transsactions_search_Label"> <?php _t("Add"); ?></h4>
      </div>
      
      <div class="modal-body">
        <?php include view("inv_transsactions","form_search"  , $arg = ["redi" => 1]); ?>
      </div>
           
    </div>
  </div>
</div>