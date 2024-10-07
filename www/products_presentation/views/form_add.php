<?php 
# MagiaPHP 
# file date creation: 2024-07-31 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="products_presentation">
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

    <?php # presentation_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="presentation_code"><?php _t("Presentation_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="presentation_code" class="form-control" id="presentation_code" placeholder="presentation_code" value="" >
        </div>	
    </div>
    <?php # /presentation_code ?>

    <?php # contains_total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contains_total"><?php _t("Contains_total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="contains_total" class="form-control" id="contains_total" placeholder="contains_total" value="" >
        </div>	
    </div>
    <?php # /contains_total ?>

    <?php # contains_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contains_code"><?php _t("Contains_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="contains_code" class="form-control" id="contains_code" placeholder="contains_code" value="" >
        </div>	
    </div>
    <?php # /contains_code ?>

    <?php # height ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="height"><?php _t("Height"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="height" class="form-control" id="height" placeholder="height" value="" >
        </div>	
    </div>
    <?php # /height ?>

    <?php # width ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="width"><?php _t("Width"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="width" class="form-control" id="width" placeholder="width" value="" >
        </div>	
    </div>
    <?php # /width ?>

    <?php # depth ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="depth"><?php _t("Depth"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="depth" class="form-control" id="depth" placeholder="depth" value="" >
        </div>	
    </div>
    <?php # /depth ?>

    <?php # weight ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="weight"><?php _t("Weight"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="weight" class="form-control" id="weight" placeholder="weight" value="" >
        </div>	
    </div>
    <?php # /weight ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
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
