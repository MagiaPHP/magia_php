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
# Fecha de creacion del documento: 2024-09-16 17:09:28 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_vehicle_management">
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

    <!-- mg_start maintenance_type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="maintenance_type"><?php _t(ucfirst("maintenance_type")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="maintenance_type" class="form-control" id="maintenance_type" placeholder="maintenance_type"  required=""  value="" >
</div>
    </div>
    <!-- mg_end maintenance_type -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?> </label>
        <div class="col-sm-8">            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end description -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
</div>
    </div>
    <!-- mg_end date -->

    <!-- mg_start cost -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="cost"><?php _t(ucfirst("cost")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="cost" class="form-control" id="cost" placeholder="cost"   value="" >
</div>
    </div>
    <!-- mg_end cost -->

    <!-- mg_start mileage -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mileage"><?php _t(ucfirst("mileage")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="mileage" class="form-control" id="mileage" placeholder="mileage"   value="" >
</div>
    </div>
    <!-- mg_end mileage -->

    <!-- mg_start next_due_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="next_due_date"><?php _t(ucfirst("next_due_date")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="next_due_date" class="form-control" id="next_due_date" placeholder="next_due_date"  value="" >
</div>
    </div>
    <!-- mg_end next_due_date -->

  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
