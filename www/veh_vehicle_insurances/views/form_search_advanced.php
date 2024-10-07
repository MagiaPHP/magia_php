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
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="veh_vehicle_insurances">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # vehicle_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="vehicle_id"><?php _t("Vehicle_id"); ?></label>
        <div class="col-sm-8">
               <select name="vehicle_id" class="form-control selectpicker" id="vehicle_id" data-live-search="true" >
                <?php veh_vehicles_select("id", array("name"), $veh_vehicle_insurances->getVehicle_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /vehicle_id ?>

    <?php # insurance_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="insurance_code"><?php _t("Insurance_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="insurance_code" class="form-control" id="insurance_code" placeholder="insurance_code"  required=""  value="" >
        </div>	
    </div>
    <?php # /insurance_code ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  required=""  value="" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  required=""  value="" >
        </div>	
    </div>
    <?php # /date_end ?>

    <?php # contrat_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contrat_number"><?php _t("Contrat_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="contrat_number" class="form-control" id="contrat_number" placeholder="contrat_number"  required=""  value="" >
        </div>	
    </div>
    <?php # /contrat_number ?>

    <?php # countries_ok ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="countries_ok"><?php _t("Countries_ok"); ?></label>
        <div class="col-sm-8">
            <textarea name="countries_ok" class="form-control" id="countries_ok" placeholder="countries_ok - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . countries_ok . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /countries_ok ?>

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
