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
# Fecha de creacion del documento: 2024-09-16 12:09:08 
#################################################################################
?>

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#budget_lines_edit_<?php echo $budget_lines_item['id']?>">
    <?php echo icon("pencil"); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="budget_lines_edit_<?php echo $budget_lines_item['id']?>" tabindex="-1" role="dialog" aria-labelledby="budget_lines_edit_<?php echo $budget_lines_item['id']?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="budget_lines_edit_<?php echo $budget_lines_item['id']?>Label"> <?php _t("Edit"); ?>
        <?php echo $budget_lines_item['id']?>    
        </h4>
      </div>
      
      <div class="modal-body">
        <?php 
        
            // $arg["redi"] = "5";
            // $arg["c"] = "contacts";
            // $arg["a"] = "index";
            // $arg["params"] = "id=$id";
            // $arg["budget_lines_id"] = $id;


        include view("budget_lines" , "form_edit" ,  $arg ); ?>
      </div>
      

    </div>
  </div>
</div>