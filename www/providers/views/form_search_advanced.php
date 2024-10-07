<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="providers">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    <?php # company_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="company_id" class="form-control" id="company_id" placeholder="company_id" value="" >
        </div>	
    </div>
    <?php # /company_id ?>

    <?php # client_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_number"><?php _t("Client_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="client_number" class="form-control" id="client_number" placeholder="client_number" value="" >
        </div>	
    </div>
    <?php # /client_number ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # discount ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="discount"><?php _t("Discount"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="discount" class="form-control" id="discount" placeholder="discount" value="" >
        </div>	
    </div>
    <?php # /discount ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="" >
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
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?><?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
