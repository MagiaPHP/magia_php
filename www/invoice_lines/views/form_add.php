<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="invoice_lines">
    <input type="hidden" name="a" value="addOk">

    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="invoice_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">
            <select  name="invoice_id" class="form-control" id="invoice_id">                                
                <?php invoices_select("id", "id", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /invoice_id ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="code" class="form-control" id="code" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /code ?>

    <?php # quantity ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="quantity"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="quantity" class="form-control" id="quantity" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /quantity ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="description" class="form-control" id="description" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /description ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="price" class="form-control" id="price" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /price ?>

    <?php # discounts ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="discounts"><?php _t("Discounts"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="discounts" class="form-control" id="discounts" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /discounts ?>

    <?php # discounts_mode ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="discounts_mode"><?php _t("Discounts_mode"); ?></label>
        <div class="col-sm-8">
            <select  name="discounts_mode" class="form-control" id="discounts_mode">                                
                <?php discounts_mode_select("discount", "discount", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /discounts_mode ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">
            <select  name="tax" class="form-control" id="tax">                                
                <?php tax_select("value", "value", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /tax ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="order_by" class="form-control" id="order_by" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
