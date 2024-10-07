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
# Fecha de creacion del documento: 2024-09-16 17:09:42 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_vehicles_fuel">
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
        <div class="col-sm-8">           
            <input type="number" step="any" name="vehicle_id" class="form-control" id="vehicle_id" placeholder="vehicle_id"   required=""  value="" >
        </div>
    </div>
    <!-- mg_end vehicle_id -->

    <!-- mg_start fuel_code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="fuel_code"><?php _t(ucfirst("fuel_code")); ?>  * </label>
        <div class="col-sm-8">               
            <select name="fuel_code" class="form-control selectpicker" id="fuel_code" data-live-search="true" >

                <?php
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                veh_fuels_select("code", array("code"), "", array());
                ?>                        
            </select>
        </div>
    </div>
    <!-- mg_end fuel_code -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
        </div>
    </div>
    <!-- mg_end date -->

    <!-- mg_start price -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t(ucfirst("price")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price"   required=""  value="" >
        </div>
    </div>
    <!-- mg_end price -->

    <!-- mg_start paid_by -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="paid_by"><?php _t(ucfirst("paid_by")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="paid_by" class="form-control" id="paid_by" placeholder="paid_by"   value="" >
            <p class="help-block"><?php echo _tr("Quien Pago ?"); ?></p></div>
    </div>
    <!-- mg_end paid_by -->

    <!-- mg_start ref -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t(ucfirst("ref")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="ref" class="form-control" id="ref" placeholder="ref"  value="" >
            <p class="help-block"><?php echo _tr("Invoice or tickect number"); ?></p></div>
    </div>
    <!-- mg_end ref -->

    <!-- mg_start notes -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t(ucfirst("notes")); ?> </label>
        <div class="col-sm-8">            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ></textarea>    <script>
            ClassicEditor
                    .create(document.querySelector('#'.notes.''))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        </div>
    </div>
    <!-- mg_end notes -->

    <!-- mg_start registred_by -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="registred_by"><?php _t(ucfirst("registred_by")); ?>  * </label>
        <div class="col-sm-8">               <select name="registred_by" class="form-control selectpicker" id="registred_by" data-live-search="true" >

                <?php users_select("contact_id", array("name", "lastname"), "", array()); ?>                        
            </select>
        </div>
    </div>
    <!-- mg_end registred_by -->

    <!-- mg_start date_registre -->
    <!-- mg_start kl -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="kl"><?php _t(ucfirst("kl")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="kl" class="form-control" id="kl" placeholder="kl"   required=""  value="" >
        </div>
    </div>
    <!-- mg_end kl -->

    <!-- mg_start order_by -->
    <!-- mg_start status -->

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

    <p>* <?php _t("Required"); ?></p>

</form>
