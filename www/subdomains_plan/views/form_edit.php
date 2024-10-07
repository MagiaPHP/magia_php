<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="subdomains_plan">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # plan ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="plan"><?php _t("Plan"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="plan" class="form-control" id="plan" placeholder="plan" value="<?php echo $subdomains_plan['plan']; ?>" >
        </div>	
    </div>
    <?php # /plan ?>

    <?php # features ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="features"><?php _t("Features"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="features" class="form-control" id="features" placeholder="features" value="<?php echo $subdomains_plan['features']; ?>" >
        </div>	
    </div>
    <?php # /features ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="price" class="form-control" id="price" placeholder="price" value="<?php echo $subdomains_plan['price']; ?>" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $subdomains_plan['order_by']; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($subdomains_plan["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($subdomains_plan["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

