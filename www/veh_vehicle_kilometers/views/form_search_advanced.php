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
# Fecha de creacion del documento: 2024-09-16 17:09:26 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="veh_vehicle_kilometers">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # vehicle_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="vehicle_id"><?php _t("Vehicle_id"); ?></label>
        <div class="col-sm-8">
               <select name="vehicle_id" class="form-control selectpicker" id="vehicle_id" data-live-search="true" >
                <?php veh_vehicles_select("id", array("name"), $veh_vehicle_kilometers->getVehicle_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /vehicle_id ?>

    <?php # event_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="event_date"><?php _t("Event_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="event_date" class="form-control" id="event_date" placeholder="event_date"  required=""  value="" >
        </div>	
    </div>
    <?php # /event_date ?>

    <?php # kl ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="kl"><?php _t("Kl"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="kl" class="form-control" id="kl" placeholder="kl"   required=""  value="" >
        </div>	
    </div>
    <?php # /kl ?>

    <?php # event_type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="event_type"><?php _t("Event_type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="event_type" class="form-control" id="event_type" placeholder="event_type"  required=""  value="" >
        </div>	
    </div>
    <?php # /event_type ?>

    <?php # event_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="event_id"><?php _t("Event_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="event_id" class="form-control" id="event_id" placeholder="event_id"   required=""  value="" >
        </div>	
    </div>
    <?php # /event_id ?>

    <?php # created_at ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="created_at"><?php _t("Created_at"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="created_at" class="form-control" id="created_at" placeholder="created_at"  required=""  value="" >
        </div>	
    </div>
    <?php # /created_at ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
