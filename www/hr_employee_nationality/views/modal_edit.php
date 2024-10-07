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
# Fecha de creacion del documento: 2024-09-21 12:09:32 
#################################################################################
?>

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#hr_employee_nationality_edit_<?php echo $hr_employee_nationality_item['id']?>">
    <?php echo icon("pencil"); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="hr_employee_nationality_edit_<?php echo $hr_employee_nationality_item['id']?>" tabindex="-1" role="dialog" aria-labelledby="hr_employee_nationality_edit_<?php echo $hr_employee_nationality_item['id']?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="hr_employee_nationality_edit_<?php echo $hr_employee_nationality_item['id']?>Label"> <?php _t("Edit"); ?>
        <?php echo $hr_employee_nationality_item['id']?>    
        </h4>
      </div>
      
      <div class="modal-body">
        <?php 
        
            // $arg["redi"] = "5";
            // $arg["c"] = "contacts";
            // $arg["a"] = "index";
            // $arg["params"] = "id=$id";
            // $arg["hr_employee_nationality_id"] = $id;


        include view("hr_employee_nationality" , "form_edit" ,  $arg ); ?>
      </div>
      

    </div>
  </div>
</div>