<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="tax">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="1">

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="name" class="form-control" id="name" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /name ?>

    <?php # value ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="value" class="form-control" id="value" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /value ?>

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
