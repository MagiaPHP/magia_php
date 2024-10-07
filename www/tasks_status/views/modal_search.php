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
# Fecha de creacion del documento: 2024-09-27 15:09:18 
#################################################################################
?>

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tasks_status_search_">
    <?php echo icon("search");  ?>
    <?php _t("Search"); ?>
</button>


<div class="modal fade" id="tasks_status_search_" tabindex="-1" role="dialog" aria-labelledby="tasks_status_search_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="tasks_status_search_Label"> <?php _t("Add"); ?></h4>
      </div>
      
      <div class="modal-body">
        <?php 
        
            // $arg["redi"] = "5";
            // $arg["c"] = "contacts";
            // $arg["a"] = "index";
            // $arg["params"] = "id=$id";
            // $arg["tasks_status_id"] = $id;

        include view("tasks_status","form_search"  , $arg = ["redi" => 1]); ?>
      </div>
           
    </div>
  </div>
</div>