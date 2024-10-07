<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="comments_read">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="1">

    <?php # order_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_id"><?php _t("Order_id"); ?></label>
        <div class="col-sm-8">
            <select  name="order_id" class="form-control selectpicker" id="order_id" data-live-search="true">
                <?php orders_select("id", "id", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /order_id ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <select  name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true">
                <?php comments_select("sender_id", "sender_id", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # date_read ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date_read"><?php _t("Date_read"); ?></label>
        <div class="col-sm-8">
            <input type="date"  name="date_read" class="form-control" id="date_read" placeholder=" - date">
        </div>	
    </div>
    <?php # /date_read ?>

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
