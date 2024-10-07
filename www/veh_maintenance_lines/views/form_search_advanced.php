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
# Fecha de creacion del documento: 2024-09-16 17:09:13 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="veh_maintenance_lines">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # maintenance_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="maintenance_id"><?php _t("Maintenance_id"); ?></label>
        <div class="col-sm-8">
               <select name="maintenance_id" class="form-control selectpicker" id="maintenance_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                veh_maintenance_select("id", array("id"), $veh_maintenance_lines->getMaintenance_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /maintenance_id ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="description" class="form-control" id="description" placeholder="description"  required=""  value="" >
        </div>	
    </div>
    <?php # /description ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price"   required=""  value="" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # quantity ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="quantity"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="quantity" class="form-control" id="quantity" placeholder="quantity"   required=""  value="" >
        </div>	
    </div>
    <?php # /quantity ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total"   value="" >
        </div>	
    </div>
    <?php # /total ?>

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
