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
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="veh_maintenance">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $veh_maintenance->getId(); ?>">
        <?php # vehicle_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="vehicle_id"><?php _t("Vehicle id"); ?></label>
        <div class="col-sm-8">
               <select name="vehicle_id" class="form-control selectpicker" id="vehicle_id" data-live-search="true"  disabled="" >
                <?php veh_vehicles_select("id", array("name"), $veh_maintenance->getVehicle_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /vehicle_id ?>

    <?php # workshop_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="workshop_id"><?php _t("Workshop id"); ?></label>
        <div class="col-sm-8">
               <select name="workshop_id" class="form-control selectpicker" id="workshop_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), $veh_maintenance->getWorkshop_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /workshop_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="<?php echo $veh_maintenance->getDate(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="type" class="form-control" id="type" placeholder="type"  value="<?php echo $veh_maintenance->getType(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # next_visit ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="next_visit"><?php _t("Next visit"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="next_visit" class="form-control" id="next_visit" placeholder="next_visit"  value="<?php echo $veh_maintenance->getNext_visit(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /next_visit ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total"   required=""  value="<?php echo $veh_maintenance->getTotal(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # kl ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="kl"><?php _t("Kl"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="kl" class="form-control" id="kl" placeholder="kl"   required=""  value="<?php echo $veh_maintenance->getKl(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /kl ?>

    <?php # notes ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea"  disabled="" ><?php echo $veh_maintenance->getNotes(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /notes ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre"  required=""  value="<?php echo $veh_maintenance->getDate_registre(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $veh_maintenance->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($veh_maintenance->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($veh_maintenance->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

