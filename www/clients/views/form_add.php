<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="clients">
    <input type="hidden" name="a" value="addOk">

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <select  name="contact_id" class="form-control" id="contact_id">                                
                <?php contacts_select("id", "id", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date"  name="date" class="form-control" id="date" placeholder=" - date">
        </div>	
    </div>
    <?php # /date ?>

    <?php # discount ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="discount"><?php _t("Discount"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="discount" class="form-control" id="discount" placeholder=" - defecto">
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
