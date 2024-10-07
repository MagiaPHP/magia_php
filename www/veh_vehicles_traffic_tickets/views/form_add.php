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
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_vehicles_traffic_tickets">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start vehicle_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="vehicle_id"><?php _t(ucfirst("vehicle_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="vehicle_id" class="form-control selectpicker" id="vehicle_id" data-live-search="true" >
                <?php veh_vehicles_select("id", array("name"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end vehicle_id -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
</div>
    </div>
    <!-- mg_end date -->

    <!-- mg_start time -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="time"><?php _t(ucfirst("time")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="time" class="form-control" id="time" placeholder="time"  value="" >
</div>
    </div>
    <!-- mg_end time -->

    <!-- mg_start pv_police -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="pv_police"><?php _t(ucfirst("pv_police")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="pv_police" class="form-control" id="pv_police" placeholder="pv_police"  required=""  value="" >
</div>
    </div>
    <!-- mg_end pv_police -->

    <!-- mg_start driver_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="driver_id"><?php _t(ucfirst("driver_id")); ?> </label>
        <div class="col-sm-8">               <select name="driver_id" class="form-control selectpicker" id="driver_id" data-live-search="true" >
                        
                <?php veh_drivers_select("id", array("name", "lastname"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end driver_id -->

    <!-- mg_start date_registre -->
    <!-- mg_start order_by -->
    <!-- mg_start status -->
  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
