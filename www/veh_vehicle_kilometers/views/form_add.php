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
# Fecha de creacion del documento: 2024-09-16 17:09:25 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_vehicle_kilometers">
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

    <!-- mg_start event_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="event_date"><?php _t(ucfirst("event_date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="event_date" class="form-control" id="event_date" placeholder="event_date"  required=""  value="" >
</div>
    </div>
    <!-- mg_end event_date -->

    <!-- mg_start kl -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="kl"><?php _t(ucfirst("kl")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="kl" class="form-control" id="kl" placeholder="kl"   required=""  value="" >
</div>
    </div>
    <!-- mg_end kl -->

    <!-- mg_start event_type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="event_type"><?php _t(ucfirst("event_type")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="event_type" class="form-control" id="event_type" placeholder="event_type"  required=""  value="" >
</div>
    </div>
    <!-- mg_end event_type -->

    <!-- mg_start event_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="event_id"><?php _t(ucfirst("event_id")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="event_id" class="form-control" id="event_id" placeholder="event_id"   required=""  value="" >
<p class="help-block"><?php echo _tr("ID del evento asociado en su tabla respectiva"); ?></p></div>
    </div>
    <!-- mg_end event_id -->

    <!-- mg_start created_at -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="created_at"><?php _t(ucfirst("created_at")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="created_at" class="form-control" id="created_at" placeholder="created_at"  required=""  value="current_timestamp()" >
</div>
    </div>
    <!-- mg_end created_at -->

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
