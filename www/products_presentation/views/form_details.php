<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="products_presentation">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $products_presentation->getId(); ?>">
        <?php # product_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="product_code"><?php _t("Product_code"); ?></label>
        <div class="col-sm-8">
               <select name="product_code" class="form-control selectpicker" id="product_code" data-live-search="true"  disabled="" >
                <?php products_select("code", array("code"), $products_presentation->getProduct_code() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /product_code ?>

    <?php # presentation_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="presentation_code"><?php _t("Presentation_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="presentation_code" class="form-control" id="presentation_code" placeholder="presentation_code" value="<?php echo $products_presentation->getPresentation_code(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /presentation_code ?>

    <?php # contains_total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contains_total"><?php _t("Contains_total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="contains_total" class="form-control" id="contains_total" placeholder="contains_total" value="<?php echo $products_presentation->getContains_total(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /contains_total ?>

    <?php # contains_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contains_code"><?php _t("Contains_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="contains_code" class="form-control" id="contains_code" placeholder="contains_code" value="<?php echo $products_presentation->getContains_code(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /contains_code ?>

    <?php # height ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="height"><?php _t("Height"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="height" class="form-control" id="height" placeholder="height" value="<?php echo $products_presentation->getHeight(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /height ?>

    <?php # width ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="width"><?php _t("Width"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="width" class="form-control" id="width" placeholder="width" value="<?php echo $products_presentation->getWidth(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /width ?>

    <?php # depth ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="depth"><?php _t("Depth"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="depth" class="form-control" id="depth" placeholder="depth" value="<?php echo $products_presentation->getDepth(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /depth ?>

    <?php # weight ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="weight"><?php _t("Weight"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="weight" class="form-control" id="weight" placeholder="weight" value="<?php echo $products_presentation->getWeight(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /weight ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="<?php echo $products_presentation->getCode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $products_presentation->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($products_presentation->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($products_presentation->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

