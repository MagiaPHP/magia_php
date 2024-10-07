<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="schedule">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id" value="" >
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # day ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="day"><?php _t("Day"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="day" class="form-control" id="day" placeholder="day" value="" >
        </div>	
    </div>
    <?php # /day ?>

    <?php # am_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="am_start"><?php _t("Am_start"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="am_start" class="form-control" id="am_start" placeholder="am_start" value="" >
        </div>	
    </div>
    <?php # /am_start ?>

    <?php # am_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="am_end"><?php _t("Am_end"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="am_end" class="form-control" id="am_end" placeholder="am_end" value="" >
        </div>	
    </div>
    <?php # /am_end ?>

    <?php # pm_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="pm_start"><?php _t("Pm_start"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="pm_start" class="form-control" id="pm_start" placeholder="pm_start" value="" >
        </div>	
    </div>
    <?php # /pm_start ?>

    <?php # pm_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="pm_end"><?php _t("Pm_end"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="pm_end" class="form-control" id="pm_end" placeholder="pm_end" value="" >
        </div>	
    </div>
    <?php # /pm_end ?>

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
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
