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
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $veh_vehicle_management->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # vehicle_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="vehicle_id"><?php _t("Vehicle_id"); ?></label>
        <div class="col-sm-8">
               <select name="vehicle_id" class="form-control selectpicker" id="vehicle_id" data-live-search="true"  disabled="" >
                <?php veh_vehicles_select("id", array("name"), $veh_vehicle_management->getVehicle_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /vehicle_id ?>

    <?php # maintenance_type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="maintenance_type"><?php _t("Maintenance_type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="maintenance_type" class="form-control" id="maintenance_type" placeholder="maintenance_type"  required=""  value="<?php echo $veh_vehicle_management->getMaintenance_type(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /maintenance_type ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $veh_vehicle_management->getDescription(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="<?php echo $veh_vehicle_management->getDate(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # cost ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="cost"><?php _t("Cost"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="cost" class="form-control" id="cost" placeholder="cost"   value="<?php echo $veh_vehicle_management->getCost(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /cost ?>

    <?php # mileage ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mileage"><?php _t("Mileage"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="mileage" class="form-control" id="mileage" placeholder="mileage"   value="<?php echo $veh_vehicle_management->getMileage(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /mileage ?>

    <?php # next_due_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="next_due_date"><?php _t("Next_due_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="next_due_date" class="form-control" id="next_due_date" placeholder="next_due_date"  value="<?php echo $veh_vehicle_management->getNext_due_date(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /next_due_date ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

