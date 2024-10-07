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
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $veh_vehicles_fuel->getId(); ?>">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # vehicle_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="vehicle_id"><?php _t("Vehicle_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="vehicle_id" class="form-control" id="vehicle_id" placeholder="vehicle_id"   required=""  value="<?php echo $veh_vehicles_fuel->getVehicle_id(); ?>" >
        </div>	
    </div>
    <?php # /vehicle_id ?>

    <?php # fuel_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="fuel_code"><?php _t("Fuel_code"); ?></label>
        <div class="col-sm-8">
               <select name="fuel_code" class="form-control selectpicker" id="fuel_code" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                veh_fuels_select("code", array("code"), $veh_vehicles_fuel->getFuel_code() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /fuel_code ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="<?php echo $veh_vehicles_fuel->getDate(); ?>" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price"   required=""  value="<?php echo $veh_vehicles_fuel->getPrice(); ?>" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # paid_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="paid_by"><?php _t("Paid_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="paid_by" class="form-control" id="paid_by" placeholder="paid_by"   value="<?php echo $veh_vehicles_fuel->getPaid_by(); ?>" >
        </div>	
    </div>
    <?php # /paid_by ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ref" class="form-control" id="ref" placeholder="ref"  value="<?php echo $veh_vehicles_fuel->getRef(); ?>" >
        </div>	
    </div>
    <?php # /ref ?>

    <?php # notes ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ><?php echo $veh_vehicles_fuel->getNotes(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /notes ?>

    <?php # registred_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="registred_by"><?php _t("Registred_by"); ?></label>
        <div class="col-sm-8">
               <select name="registred_by" class="form-control selectpicker" id="registred_by" data-live-search="true" >
                        
                <?php users_select("contact_id", array("name", "lastname"), $veh_vehicles_fuel->getRegistred_by() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /registred_by ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre"  required=""  value="<?php echo $veh_vehicles_fuel->getDate_registre(); ?>" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # kl ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="kl"><?php _t("Kl"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="kl" class="form-control" id="kl" placeholder="kl"   required=""  value="<?php echo $veh_vehicles_fuel->getKl(); ?>" >
        </div>	
    </div>
    <?php # /kl ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $veh_vehicles_fuel->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($veh_vehicles_fuel->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($veh_vehicles_fuel->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

