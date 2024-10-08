<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-31 17:08:56 
#################################################################################
?>

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#magia_tables_edit_">
    <?php echo icon("pencil"); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="magia_tables_edit_" tabindex="-1" role="dialog" aria-labelledby="magia_tables_edit_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="magia_tables_edit_Label"> <?php _t("Edit"); ?></h4>
      </div>
      
      <div class="modal-body">
        <?php include view("magia_tables","form_edit"   , $arg = ["redi" => 1]); ?>
      </div>
      

    </div>
  </div>
</div>