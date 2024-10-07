<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="products_presentation_names">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # presentation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="presentation"><?php _t("Presentation"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="presentation" class="form-control" id="presentation" placeholder="presentation" value="" >
        </div>	
    </div>
    <?php # /presentation ?>

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
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
