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
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="veh_vehicles_traffic_tickets">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # vehicle_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="vehicle_id"><?php _t("Vehicle_id"); ?></label>
        <div class="col-sm-8">
               <select name="vehicle_id" class="form-control selectpicker" id="vehicle_id" data-live-search="true" >
                <?php veh_vehicles_select("id", array("name"), $veh_vehicles_traffic_tickets->getVehicle_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /vehicle_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # time ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="time"><?php _t("Time"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="time" class="form-control" id="time" placeholder="time"  value="" >
        </div>	
    </div>
    <?php # /time ?>

    <?php # pv_police ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="pv_police"><?php _t("Pv_police"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="pv_police" class="form-control" id="pv_police" placeholder="pv_police"  required=""  value="" >
        </div>	
    </div>
    <?php # /pv_police ?>

    <?php # driver_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="driver_id"><?php _t("Driver_id"); ?></label>
        <div class="col-sm-8">
               <select name="driver_id" class="form-control selectpicker" id="driver_id" data-live-search="true" >
                        
                <?php veh_drivers_select("id", array("name", "lastname"), $veh_vehicles_traffic_tickets->getDriver_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /driver_id ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre"  required=""  value="" >
        </div>	
    </div>
    <?php # /date_registre ?>

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
