<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="invoice_lines">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="invoice_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="<?php echo "$invoice_lines[invoice_id]"; ?>" >
        </div>	
    </div>
    <?php # /invoice_id ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code" class="form-control"  id="code" placeholder="code" value="<?php echo "$invoice_lines[code]"; ?>" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # quantity ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="quantity"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="quantity" class="form-control"  id="quantity" placeholder="quantity" value="<?php echo "$invoice_lines[quantity]"; ?>" >
        </div>	
    </div>
    <?php # /quantity ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="description" class="form-control"  id="description" placeholder="description" value="<?php echo "$invoice_lines[description]"; ?>" >
        </div>	
    </div>
    <?php # /description ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="price" class="form-control"  id="price" placeholder="price" value="<?php echo "$invoice_lines[price]"; ?>" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # discounts ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="discounts"><?php _t("Discounts"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="discounts" class="form-control"  id="discounts" placeholder="discounts" value="<?php echo "$invoice_lines[discounts]"; ?>" >
        </div>	
    </div>
    <?php # /discounts ?>

    <?php # discounts_mode ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="discounts_mode"><?php _t("Discounts_mode"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="discounts_mode" class="form-control"  id="discounts_mode" placeholder="discounts_mode" value="<?php echo "$invoice_lines[discounts_mode]"; ?>" >
        </div>	
    </div>
    <?php # /discounts_mode ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tax" class="form-control"  id="tax" placeholder="tax" value="<?php echo "$invoice_lines[tax]"; ?>" >
        </div>	
    </div>
    <?php # /tax ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$invoice_lines[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$invoice_lines[status]"; ?>" >
        </div>	
    </div>
    <?php # /status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

