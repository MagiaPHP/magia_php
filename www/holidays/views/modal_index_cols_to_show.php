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
# Fecha de creacion del documento: 2024-09-23 21:09:21 
#################################################################################
?>
<a href="#"
   data-toggle="modal" data-target="#myModal_holidays_index_cols_to_show"
   >
       <?php echo icon("wrench"); ?>
</a>

<div class="modal fade" id="myModal_holidays_index_cols_to_show" tabindex="-1" role="dialog" aria-labelledby="myModal_holidays_index_cols_to_showLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_holidays_index_cols_to_showLabel">
                    <?php _t("Cols to show"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php 
                
            // $arg["redi"] = "5";
            // $arg["c"] = "contacts";
            // $arg["a"] = "veh_vehicles_drivers";
            // $arg["params"] = "id=$id";
            // $arg["driver_id"] = $id;

            include "form_index_cols_to_show.php"; ?>
            
            </div>
        </div>
    </div>
</div>

