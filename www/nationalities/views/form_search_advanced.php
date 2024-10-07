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
# Fecha de creacion del documento: 2024-09-27 12:09:58 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="nationalities">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # num_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="num_code"><?php _t("Num_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="num_code" class="form-control" id="num_code" placeholder="num_code"  required=""  value="" >
        </div>	
    </div>
    <?php # /num_code ?>

    <?php # alpha_2_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="alpha_2_code"><?php _t("Alpha_2_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="alpha_2_code" class="form-control" id="alpha_2_code" placeholder="alpha_2_code"  value="" >
        </div>	
    </div>
    <?php # /alpha_2_code ?>

    <?php # alpha_3_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="alpha_3_code"><?php _t("Alpha_3_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="alpha_3_code" class="form-control" id="alpha_3_code" placeholder="alpha_3_code"  value="" >
        </div>	
    </div>
    <?php # /alpha_3_code ?>

    <?php # en_short_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="en_short_name"><?php _t("En_short_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="en_short_name" class="form-control" id="en_short_name" placeholder="en_short_name"  value="" >
        </div>	
    </div>
    <?php # /en_short_name ?>

    <?php # nationality ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="nationality"><?php _t("Nationality"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="nationality" class="form-control" id="nationality" placeholder="nationality"  value="" >
        </div>	
    </div>
    <?php # /nationality ?>

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
