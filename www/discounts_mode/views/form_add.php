<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="discounts_mode">
    <input type="hidden" name="a" value="addOk">

    <?php # discount ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="discount"><?php _t("Discount"); ?></label>
        <div class="col-sm-8">
            <select  name="discount" class="form-control" id="discount">                                
                <?php _select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /discount ?>

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
