<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="comments_read">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="1">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$comments_read[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # order_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_id" name="order_id" class="form-control"  id="order_id" placeholder="order_id" value="<?php echo "$comments_read[order_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_id ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="contact_id" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="<?php echo "$comments_read[contact_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # contact_id ?>

    <?php # date_read ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_read"); ?></label>
        <div class="col-sm-8">                    
            <input type="date_read" name="date_read" class="form-control"  id="date_read" placeholder="date_read" value="<?php echo "$comments_read[date_read]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # date_read ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$comments_read[order_by]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$comments_read[status]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

