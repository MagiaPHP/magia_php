<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="patients">
    <input type="hidden" name="a" value="addOk">

    <?php # company_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="company_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">
            <select  name="company_id" class="form-control" id="company_id">                                
                <?php _select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /company_id ?>

    <?php # company_ref ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="company_ref"><?php _t("Company_ref"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="company_ref" class="form-control" id="company_ref" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /company_ref ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <select  name="contact_id" class="form-control" id="contact_id">                                
                <?php _select("", "", array(), array()); ?>                        
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
