<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="patients">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$patients[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # company_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="company_id" name="company_id" class="form-control"  id="company_id" placeholder="company_id" value="<?php echo "$patients[company_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # company_id ?>

    <?php # company_ref ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Company_ref"); ?></label>
        <div class="col-sm-8">                    
            <input type="company_ref" name="company_ref" class="form-control"  id="company_ref" placeholder="company_ref" value="<?php echo "$patients[company_ref]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # company_ref ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="contact_id" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="<?php echo "$patients[contact_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # contact_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="date" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$patients[date]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # date ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$patients[order_by]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$patients[status]"; ?>" disabled="" >
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

