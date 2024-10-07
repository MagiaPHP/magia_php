<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="subdomains">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                <?php contacts_select("id", array("name", "lastname"), $subdomains->getContact_id(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # create_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="create_by"><?php _t("Create_by"); ?></label>
        <div class="col-sm-8">
            <select name="create_by" class="form-control selectpicker" id="create_by" data-live-search="true" >
                <?php contacts_select("tva", array("tva"), $subdomains->getCreate_by(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /create_by ?>

    <?php # plan ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="plan"><?php _t("Plan"); ?></label>
        <div class="col-sm-8">
            <select name="plan" class="form-control selectpicker" id="plan" data-live-search="true" >
                <?php subdomains_plan_select("plan", array("plan"), $subdomains->getPlan(), array()); ?>                        
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
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre" value="" >
        </div>	
    </div>
    <?php # /date_registre ?>

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
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
