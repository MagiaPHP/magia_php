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
# Fecha de creacion del documento: 2024-10-01 09:10:44 
#################################################################################
?>

<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#contacts_edit_<?php echo $contacts_item['id']?>">
    <?php echo icon("pencil"); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="contacts_edit_<?php echo $contacts_item['id']?>" tabindex="-1" role="dialog" aria-labelledby="contacts_edit_<?php echo $contacts_item['id']?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="contacts_edit_<?php echo $contacts_item['id']?>Label"> <?php _t("Edit"); ?>
        <?php echo $contacts_item['id']?>    
        </h4>
      </div>
      
      <div class="modal-body">
        <?php 
        
            // $arg["redi"] = "5";
            // $arg["c"] = "contacts";
            // $arg["a"] = "index";
            // $arg["params"] = "id=$id";
            // $arg["contacts_id"] = $id;


        include view("contacts" , "form_edit" ,  $arg ); ?>
      </div>
      

    </div>
  </div>
</div>