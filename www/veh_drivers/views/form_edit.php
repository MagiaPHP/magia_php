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
# Fecha de creacion del documento: 2024-09-16 17:09:55 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_drivers">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $veh_drivers->getId(); ?>">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id"   required=""  value="<?php echo $veh_drivers->getContact_id(); ?>" >
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # country ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="country"><?php _t("Country"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="country" class="form-control" id="country" placeholder="country"  required=""  value="<?php echo $veh_drivers->getCountry(); ?>" >
        </div>	
    </div>
    <?php # /country ?>

    <?php # license ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="license"><?php _t("License"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="license" class="form-control" id="license" placeholder="license"  required=""  value="<?php echo $veh_drivers->getLicense(); ?>" >
        </div>	
    </div>
    <?php # /license ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="type" class="form-control" id="type" placeholder="type"  required=""  value="<?php echo $veh_drivers->getType(); ?>" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="number"><?php _t("Number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="number" class="form-control" id="number" placeholder="number"  required=""  value="<?php echo $veh_drivers->getNumber(); ?>" >
        </div>	
    </div>
    <?php # /number ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  required=""  value="<?php echo $veh_drivers->getDate_start(); ?>" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  required=""  value="<?php echo $veh_drivers->getDate_end(); ?>" >
        </div>	
    </div>
    <?php # /date_end ?>

    <?php # expired ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="expired"><?php _t("Expired"); ?></label>
        <div class="col-sm-8">
            <select name="expired" class="form-control" id="expired" >                
                <option value="1" <?php echo ($veh_drivers->getExpired() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($veh_drivers->getExpired() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /expired ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $veh_drivers->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($veh_drivers->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($veh_drivers->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

