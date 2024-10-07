<?php 
# MagiaPHP 
# file date creation: 2024-07-31 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="products_price">
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

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price" value="" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # date_from ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_from"><?php _t("Date_from"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_from" class="form-control" id="date_from" placeholder="date_from" value="" >
        </div>	
    </div>
    <?php # /date_from ?>

    <?php # date_to ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_to"><?php _t("Date_to"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_to" class="form-control" id="date_to" placeholder="date_to" value="" >
        </div>	
    </div>
    <?php # /date_to ?>

    <?php # online ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="online"><?php _t("Online"); ?></label>
        <div class="col-sm-8">
            <select name="online" class="form-control" id="online" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /online ?>

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
