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

    <!-- mg_start driver_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="driver_id"><?php _t(ucfirst("driver_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="driver_id" class="form-control selectpicker" id="driver_id" data-live-search="true" >
                        
                <?php veh_drivers_select("contact_id", array("name", "lastname"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end driver_id -->

    <!-- mg_start start_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_date"><?php _t(ucfirst("start_date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="start_date" class="form-control" id="start_date" placeholder="start_date"  required=""  value="" >
</div>
    </div>
    <!-- mg_end start_date -->

    <!-- mg_start time_start -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="time_start"><?php _t(ucfirst("time_start")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="time_start" class="form-control" id="time_start" placeholder="time_start"  value="" >
</div>
    </div>
    <!-- mg_end time_start -->

    <!-- mg_start kl_start -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="kl_start"><?php _t(ucfirst("kl_start")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="kl_start" class="form-control" id="kl_start" placeholder="kl_start"   value="" >
</div>
    </div>
    <!-- mg_end kl_start -->

    <!-- mg_start end_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_date"><?php _t(ucfirst("end_date")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="end_date" class="form-control" id="end_date" placeholder="end_date"  value="" >
</div>
    </div>
    <!-- mg_end end_date -->

    <!-- mg_start time_end -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="time_end"><?php _t(ucfirst("time_end")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="time_end" class="form-control" id="time_end" placeholder="time_end"  value="" >
</div>
    </div>
    <!-- mg_end time_end -->

    <!-- mg_start kl_end -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="kl_end"><?php _t(ucfirst("kl_end")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="kl_end" class="form-control" id="kl_end" placeholder="kl_end"   value="" >
</div>
    </div>
    <!-- mg_end kl_end -->

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
