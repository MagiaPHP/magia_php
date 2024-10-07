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
# Fecha de creacion del documento: 2024-09-16 17:09:46 
#################################################################################
?>


<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#veh_vehicles_traffic_tickets_add_<?php echo $veh_vehicles_traffic_tickets_item["id"]; ?>">
    <?php echo icon("plus"); ?>
    <?php _t("Add new"); ?>
</button>


<div class="modal fade" id="veh_vehicles_traffic_tickets_add_<?php echo $veh_vehicles_traffic_tickets_item["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="veh_vehicles_traffic_tickets_add_<?php echo $veh_vehicles_traffic_tickets_item["id"]; ?>Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="veh_vehicles_traffic_tickets_add_<?php echo $veh_vehicles_traffic_tickets_item["id"]; ?>Label"> <?php _t("Add"); ?></h4>
      </div>
      <div class="modal-body">
        <?php 
        

            // $arg["redi"] = "5";
            // $arg["c"] = "contacts";
            // $arg["a"] = "veh_vehicles_drivers";
            // $arg["params"] = "id=$id";
            // $arg["driver_id"] = $id;
                



        $redi = 1;
        
        include view("veh_vehicles_traffic_tickets","form_add"   , $arg = ["redi" => 1]); 
        
        $redi = "";     
        

        ?>
      </div>
      

      
    </div>
  </div>
</div>


