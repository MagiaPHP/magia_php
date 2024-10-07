<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="providers">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $providers->getId(); ?>">
    <?php # company_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="company_id" class="form-control" id="company_id" placeholder="company_id" value="<?php echo $providers->getCompany_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /company_id ?>

    <?php # client_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_number"><?php _t("Client_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="client_number" class="form-control" id="client_number" placeholder="client_number" value="<?php echo $providers->getClient_number(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /client_number ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="<?php echo $providers->getDate(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # discount ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="discount"><?php _t("Discount"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="discount" class="form-control" id="discount" placeholder="discount" value="<?php echo $providers->getDiscount(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /discount ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $providers->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($providers->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($providers->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    

            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?><?php _t("Edit"); ?></button>

        </div>      							
    </div>      							

</form>

