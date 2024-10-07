<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="api">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
               <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                <?php contacts_select("id", array("name", "lastname"), $api->getContact_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # api_key ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="api_key"><?php _t("Api_key"); ?></label>
        <div class="col-sm-8">
            <textarea name="api_key" class="form-control" id="api_key" placeholder="api_key - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . api_key . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /api_key ?>

    <?php # crud ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="crud"><?php _t("Crud"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="crud" class="form-control" id="crud" placeholder="crud" value="" >
        </div>	
    </div>
    <?php # /crud ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start" value="" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end" value="" >
        </div>	
    </div>
    <?php # /date_end ?>

    <?php # requests_limit ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="requests_limit"><?php _t("Requests_limit"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="requests_limit" class="form-control" id="requests_limit" placeholder="requests_limit" value="" >
        </div>	
    </div>
    <?php # /requests_limit ?>

    <?php # limit_period ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="limit_period"><?php _t("Limit_period"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="limit_period" class="form-control" id="limit_period" placeholder="limit_period" value="" >
        </div>	
    </div>
    <?php # /limit_period ?>

    <?php # requests_made ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="requests_made"><?php _t("Requests_made"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="requests_made" class="form-control" id="requests_made" placeholder="requests_made" value="" >
        </div>	
    </div>
    <?php # /requests_made ?>

    <?php # last_request ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="last_request"><?php _t("Last_request"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="last_request" class="form-control" id="last_request" placeholder="last_request" value="" >
        </div>	
    </div>
    <?php # /last_request ?>

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
