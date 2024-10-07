<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="products_stock">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $products_stock->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

        <?php # product_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="product_code"><?php _t("Product_code"); ?></label>
        <div class="col-sm-8">
               <select name="product_code" class="form-control selectpicker" id="product_code" data-live-search="true"  disabled="" >
                <?php products_select("code", array("code"), $products_stock->getProduct_code() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /product_code ?>

    <?php # office_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id"><?php _t("Office_id"); ?></label>
        <div class="col-sm-8">
               <select name="office_id" class="form-control selectpicker" id="office_id" data-live-search="true"  disabled="" >
                <?php contacts_select("id", array("id"), $products_stock->getOffice_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /office_id ?>

    <?php # stock ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="stock"><?php _t("Stock"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="stock" class="form-control" id="stock" placeholder="stock" value="<?php echo $products_stock->getStock(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /stock ?>

    <?php # stock_min ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="stock_min"><?php _t("Stock_min"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="stock_min" class="form-control" id="stock_min" placeholder="stock_min" value="<?php echo $products_stock->getStock_min(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /stock_min ?>

    <?php # stock_max ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="stock_max"><?php _t("Stock_max"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="stock_max" class="form-control" id="stock_max" placeholder="stock_max" value="<?php echo $products_stock->getStock_max(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /stock_max ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $products_stock->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($products_stock->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($products_stock->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

