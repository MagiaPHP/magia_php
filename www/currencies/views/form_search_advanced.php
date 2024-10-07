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
# Fecha de creacion del documento: 2024-09-04 08:09:19 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="currencies">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # rate ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="rate"><?php _t("Rate"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="rate" class="form-control" id="rate" placeholder="rate"  required=""  value="" >
        </div>	
    </div>
    <?php # /rate ?>

    <?php # rate_silent ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="rate_silent"><?php _t("Rate_silent"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="rate_silent" class="form-control" id="rate_silent" placeholder="rate_silent"  required=""  value="" >
        </div>	
    </div>
    <?php # /rate_silent ?>

    <?php # rate_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="rate_id"><?php _t("Rate_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="rate_id" class="form-control" id="rate_id" placeholder="rate_id"   required=""  value="" >
        </div>	
    </div>
    <?php # /rate_id ?>

    <?php # accuracy ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="accuracy"><?php _t("Accuracy"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="accuracy" class="form-control" id="accuracy" placeholder="accuracy"   required=""  value="" >
        </div>	
    </div>
    <?php # /accuracy ?>

    <?php # rounding ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="rounding"><?php _t("Rounding"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="rounding" class="form-control" id="rounding" placeholder="rounding"  required=""  value="" >
        </div>	
    </div>
    <?php # /rounding ?>

    <?php # active ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="active"><?php _t("Active"); ?></label>
        <div class="col-sm-8">
            <select name="active" class="form-control" id="active" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /active ?>

    <?php # company_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="company_id" class="form-control" id="company_id" placeholder="company_id"   required=""  value="" >
        </div>	
    </div>
    <?php # /company_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # base ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="base"><?php _t("Base"); ?></label>
        <div class="col-sm-8">
            <select name="base" class="form-control" id="base" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /base ?>

    <?php # position ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="position"><?php _t("Position"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="position" class="form-control" id="position" placeholder="position"  required=""  value="" >
        </div>	
    </div>
    <?php # /position ?>

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
            <input type="number" step="any" name="status" class="form-control" id="status" placeholder="status"   required=""  value="" >
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
