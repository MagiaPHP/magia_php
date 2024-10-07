<?php
# MagiaPHP 
# file date creation: 2024-01-19 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="subdomains_plan_features">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # plan ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="plan"><?php _t("Plan"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="plan" class="form-control" id="plan" placeholder="plan" value="" >
        </div>	
    </div>
    <?php # /plan ?>

    <?php # feature ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="feature"><?php _t("Feature"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="feature" class="form-control" id="feature" placeholder="feature" value="" >
        </div>	
    </div>
    <?php # /feature ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # stattus ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="stattus"><?php _t("Stattus"); ?></label>
        <div class="col-sm-8">
            <select name="stattus" class="form-control" id="stattus" >                
                <option value="1" <?php echo ($subdomains_plan_features["stattus"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($subdomains_plan_features["stattus"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /stattus ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
