<?php
# MagiaPHP 
# file date creation: 2024-05-15 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="subdomains">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                <?php contacts_select("id", array("name", "lastname"), "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # create_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="create_by"><?php _t("Create_by"); ?></label>
        <div class="col-sm-8">
            <select name="create_by" class="form-control selectpicker" id="create_by" data-live-search="true" >
                <?php contacts_select("tva", array("tva"), "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /create_by ?>

    <?php # plan ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="plan"><?php _t("Plan"); ?></label>
        <div class="col-sm-8">
            <select name="plan" class="form-control selectpicker" id="plan" data-live-search="true" >
                <?php subdomains_plan_select("plan", array("plan"), "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /plan ?>

    <?php # prefix ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="prefix"><?php _t("Prefix"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="prefix" class="form-control" id="prefix" placeholder="prefix" value="" >
        </div>	
    </div>
    <?php # /prefix ?>

    <?php # subdomain ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="subdomain"><?php _t("Subdomain"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="subdomain" class="form-control" id="subdomain" placeholder="subdomain" value="" >
        </div>	
    </div>
    <?php # /subdomain ?>

    <?php # domain ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="domain"><?php _t("Domain"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="domain" class="form-control" id="domain" placeholder="domain" value="" >
        </div>	
    </div>
    <?php # /domain ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # date_registre ?>
    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
