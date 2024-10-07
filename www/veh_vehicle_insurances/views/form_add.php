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
# Fecha de creacion del documento: 2024-09-16 17:09:21 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_vehicle_insurances">
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

    <!-- mg_start insurance_code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="insurance_code"><?php _t(ucfirst("insurance_code")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="insurance_code" class="form-control" id="insurance_code" placeholder="insurance_code"  required=""  value="" >
</div>
    </div>
    <!-- mg_end insurance_code -->

    <!-- mg_start date_start -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t(ucfirst("date_start")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  required=""  value="" >
</div>
    </div>
    <!-- mg_end date_start -->

    <!-- mg_start date_end -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t(ucfirst("date_end")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  required=""  value="" >
</div>
    </div>
    <!-- mg_end date_end -->

    <!-- mg_start contrat_number -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contrat_number"><?php _t(ucfirst("contrat_number")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="contrat_number" class="form-control" id="contrat_number" placeholder="contrat_number"  required=""  value="" >
</div>
    </div>
    <!-- mg_end contrat_number -->

    <!-- mg_start countries_ok -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="countries_ok"><?php _t(ucfirst("countries_ok")); ?>  * </label>
        <div class="col-sm-8">            <textarea name="countries_ok" class="form-control" id="countries_ok" placeholder="countries_ok - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . countries_ok . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end countries_ok -->

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
