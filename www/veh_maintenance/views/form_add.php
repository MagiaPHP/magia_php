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
# Fecha de creacion del documento: 2024-09-16 17:09:09 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_maintenance">
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

    <!-- mg_start workshop_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="workshop_id"><?php _t(ucfirst("workshop_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="workshop_id" class="form-control selectpicker" id="workshop_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end workshop_id -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
</div>
    </div>
    <!-- mg_end date -->

    <!-- mg_start type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t(ucfirst("type")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="type" class="form-control" id="type" placeholder="type"  value="" >
<p class="help-block"><?php echo _tr("Tipo de mantenimiento, e.g., cambio de aceite"); ?></p></div>
    </div>
    <!-- mg_end type -->

    <!-- mg_start next_visit -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="next_visit"><?php _t(ucfirst("next_visit")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="next_visit" class="form-control" id="next_visit" placeholder="next_visit"  value="" >
<p class="help-block"><?php echo _tr("Fecha del próximo cambio de aceite"); ?></p></div>
    </div>
    <!-- mg_end next_visit -->

    <!-- mg_start total -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t(ucfirst("total")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total"   required=""  value="" >
</div>
    </div>
    <!-- mg_end total -->

    <!-- mg_start kl -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="kl"><?php _t(ucfirst("kl")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="kl" class="form-control" id="kl" placeholder="kl"   required=""  value="" >
</div>
    </div>
    <!-- mg_end kl -->

    <!-- mg_start notes -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t(ucfirst("notes")); ?> </label>
        <div class="col-sm-8">            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end notes -->

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
