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
# Fecha de creacion del documento: 2024-09-16 17:09:17 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_vehicle_activities">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $veh_vehicle_activities->getId(); ?>">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # vehicle_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="vehicle_id"><?php _t("Vehicle_id"); ?></label>
        <div class="col-sm-8">
               <select name="vehicle_id" class="form-control selectpicker" id="vehicle_id" data-live-search="true" >
                <?php veh_vehicles_select("id", array("name"), $veh_vehicle_activities->getVehicle_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /vehicle_id ?>

    <?php # driver_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="driver_id"><?php _t("Driver_id"); ?></label>
        <div class="col-sm-8">
               <select name="driver_id" class="form-control selectpicker" id="driver_id" data-live-search="true" >
                        
                <?php veh_drivers_select("contact_id", array("name", "lastname"), $veh_vehicle_activities->getDriver_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /driver_id ?>

    <?php # start_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_date"><?php _t("Start_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="start_date" class="form-control" id="start_date" placeholder="start_date"  required=""  value="<?php echo $veh_vehicle_activities->getStart_date(); ?>" >
        </div>	
    </div>
    <?php # /start_date ?>

    <?php # time_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="time_start"><?php _t("Time_start"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="time_start" class="form-control" id="time_start" placeholder="time_start"  value="<?php echo $veh_vehicle_activities->getTime_start(); ?>" >
        </div>	
    </div>
    <?php # /time_start ?>

    <?php # kl_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="kl_start"><?php _t("Kl_start"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="kl_start" class="form-control" id="kl_start" placeholder="kl_start"   value="<?php echo $veh_vehicle_activities->getKl_start(); ?>" >
        </div>	
    </div>
    <?php # /kl_start ?>

    <?php # end_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_date"><?php _t("End_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="end_date" class="form-control" id="end_date" placeholder="end_date"  value="<?php echo $veh_vehicle_activities->getEnd_date(); ?>" >
        </div>	
    </div>
    <?php # /end_date ?>

    <?php # time_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="time_end"><?php _t("Time_end"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="time_end" class="form-control" id="time_end" placeholder="time_end"  value="<?php echo $veh_vehicle_activities->getTime_end(); ?>" >
        </div>	
    </div>
    <?php # /time_end ?>

    <?php # kl_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="kl_end"><?php _t("Kl_end"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="kl_end" class="form-control" id="kl_end" placeholder="kl_end"   value="<?php echo $veh_vehicle_activities->getKl_end(); ?>" >
        </div>	
    </div>
    <?php # /kl_end ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $veh_vehicle_activities->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="status" class="form-control" id="status" placeholder="status"   required=""  value="<?php echo $veh_vehicle_activities->getStatus(); ?>" >
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

