<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="schedule">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $schedule->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

        <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id" value="<?php echo $schedule->getContact_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # day ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="day"><?php _t("Day"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="day" class="form-control" id="day" placeholder="day" value="<?php echo $schedule->getDay(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /day ?>

    <?php # am_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="am_start"><?php _t("Am_start"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="am_start" class="form-control" id="am_start" placeholder="am_start" value="<?php echo $schedule->getAm_start(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /am_start ?>

    <?php # am_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="am_end"><?php _t("Am_end"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="am_end" class="form-control" id="am_end" placeholder="am_end" value="<?php echo $schedule->getAm_end(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /am_end ?>

    <?php # pm_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="pm_start"><?php _t("Pm_start"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="pm_start" class="form-control" id="pm_start" placeholder="pm_start" value="<?php echo $schedule->getPm_start(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /pm_start ?>

    <?php # pm_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="pm_end"><?php _t("Pm_end"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="pm_end" class="form-control" id="pm_end" placeholder="pm_end" value="<?php echo $schedule->getPm_end(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /pm_end ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $schedule->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($schedule->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($schedule->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

