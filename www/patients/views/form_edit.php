<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="patients">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # company_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="company_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="company_id" class="form-control"  id="company_id" placeholder="company_id" value="<?php echo "$patients[company_id]"; ?>" >
        </div>	
    </div>
    <?php # /company_id ?>

    <?php # company_ref ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="company_ref"><?php _t("Company_ref"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="company_ref" class="form-control"  id="company_ref" placeholder="company_ref" value="<?php echo "$patients[company_ref]"; ?>" >
        </div>	
    </div>
    <?php # /company_ref ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="<?php echo "$patients[contact_id]"; ?>" >
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$patients[date]"; ?>" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$patients[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$patients[status]"; ?>" >
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

