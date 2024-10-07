<?php 
# MagiaPHP 
# file date creation: 2024-07-31 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="products_related">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">
    
    <?php # product_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="product_code"><?php _t("Product_code"); ?></label>
        <div class="col-sm-8">
               <select name="product_code" class="form-control selectpicker" id="product_code" data-live-search="true" >
                <?php products_select("code", array("code"), "" , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /product_code ?>

    <?php # related_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="related_code"><?php _t("Related_code"); ?></label>
        <div class="col-sm-8">
               <select name="related_code" class="form-control selectpicker" id="related_code" data-live-search="true" >
                <?php products_select("code", array("code"), "" , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /related_code ?>

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
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>

  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
