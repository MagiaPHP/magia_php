<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="emails_tmp">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id" value="<?php echo $emails_tmp['contact_id']; ?>" >
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # tmp ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tmp"><?php _t("Tmp"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="tmp" class="form-control" id="tmp" placeholder="tmp" value="<?php echo $emails_tmp['tmp']; ?>" >
        </div>	
    </div>
    <?php # /tmp ?>

    <?php # body ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="body"><?php _t("Body"); ?></label>
        <div class="col-sm-8">
            <textarea name="body" class="form-control" id="body" placeholder="body - textarea" ><?php echo $emails_tmp['body']; ?></textarea>
        </div>	
    </div>
    <?php # /body ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $emails_tmp['order_by']; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($emails_tmp["status"] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($emails_tmp["status"] == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

