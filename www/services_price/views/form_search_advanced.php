<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="services_price">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    <?php # service_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="service_code"><?php _t("Service_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="service_code" class="form-control" id="service_code" placeholder="service_code" value="" >
        </div>	
    </div>
    <?php # /service_code ?>

    <?php # unite_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="unite_code"><?php _t("Unite_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="unite_code" class="form-control" id="unite_code" placeholder="unite_code" value="" >
        </div>	
    </div>
    <?php # /unite_code ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price" value="" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="" >
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
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
