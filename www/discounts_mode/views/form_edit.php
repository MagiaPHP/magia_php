<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="discounts_mode">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # discount ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="discount"><?php _t("Discount"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="discount" class="form-control"  id="discount" placeholder="discount" value="<?php echo "$discounts_mode[discount]"; ?>" >
        </div>	
    </div>
    <?php # /discount ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$discounts_mode[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$discounts_mode[status]"; ?>" >
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

