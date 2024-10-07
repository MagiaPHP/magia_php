<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="products_stock">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # product_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="product_code"><?php _t("Product_code"); ?></label>
        <div class="col-sm-8">
               <select name="product_code" class="form-control selectpicker" id="product_code" data-live-search="true" >
                <?php products_select("code", array("code"), $products_stock->getProduct_code() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /product_code ?>

    <?php # office_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id"><?php _t("Office_id"); ?></label>
        <div class="col-sm-8">
               <select name="office_id" class="form-control selectpicker" id="office_id" data-live-search="true" >
                <?php contacts_select("id", array("id"), $products_stock->getOffice_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /office_id ?>

    <?php # stock ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="stock"><?php _t("Stock"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="stock" class="form-control" id="stock" placeholder="stock" value="" >
        </div>	
    </div>
    <?php # /stock ?>

    <?php # stock_min ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="stock_min"><?php _t("Stock_min"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="stock_min" class="form-control" id="stock_min" placeholder="stock_min" value="" >
        </div>	
    </div>
    <?php # /stock_min ?>

    <?php # stock_max ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="stock_max"><?php _t("Stock_max"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="stock_max" class="form-control" id="stock_max" placeholder="stock_max" value="" >
        </div>	
    </div>
    <?php # /stock_max ?>

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
