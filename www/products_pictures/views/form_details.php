<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="products_pictures">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $products_pictures->getId(); ?>">
        <?php # product_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="product_code"><?php _t("Product_code"); ?></label>
        <div class="col-sm-8">
               <select name="product_code" class="form-control selectpicker" id="product_code" data-live-search="true"  disabled="" >
                <?php products_select("code", array("code"), $products_pictures->getProduct_code() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /product_code ?>

    <?php # picture_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="picture_id"><?php _t("Picture_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="picture_id" class="form-control" id="picture_id" placeholder="picture_id" value="<?php echo $products_pictures->getPicture_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /picture_id ?>

    <?php # principal ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="principal"><?php _t("Principal"); ?></label>
        <div class="col-sm-8">
            <select name="principal" class="form-control" id="principal"  disabled="" >                
                <option value="1" <?php echo ($products_pictures->getPrincipal() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($products_pictures->getPrincipal() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /principal ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $products_pictures->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($products_pictures->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($products_pictures->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

