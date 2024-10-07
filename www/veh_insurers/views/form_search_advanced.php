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
# Fecha de creacion del documento: 2024-09-16 17:09:04 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="veh_insurers">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # insurer_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="insurer_id"><?php _t("Insurer_id"); ?></label>
        <div class="col-sm-8">
               <select name="insurer_id" class="form-control selectpicker" id="insurer_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), $veh_insurers->getInsurer_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /insurer_id ?>

    <?php # insurer_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="insurer_code"><?php _t("Insurer_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="insurer_code" class="form-control" id="insurer_code" placeholder="insurer_code"  required=""  value="" >
        </div>	
    </div>
    <?php # /insurer_code ?>

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
