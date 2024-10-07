<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="investments">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


    <?php # institution_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="institution_id"><?php _t("Institution_id"); ?></label>
        <div class="col-sm-8">
            <select name="institution_id" class="form-control selectpicker" id="institution_id" data-live-search="true" >
                <?php contacts_select("id", "id", $investments['institution_id'], array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /institution_id ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="type" class="form-control" id="type" placeholder="type" value="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # operation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="operation"><?php _t("Operation"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="operation" class="form-control" id="operation" placeholder="operation" value="" >
        </div>	
    </div>
    <?php # /operation ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ref" class="form-control" id="ref" placeholder="ref" value="" >
        </div>	
    </div>
    <?php # /ref ?>

    <?php # amount ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="amount"><?php _t("Amount"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="amount" class="form-control" id="amount" placeholder="amount" value="" >
        </div>	
    </div>
    <?php # /amount ?>

    <?php # days ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="days"><?php _t("Days"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="days" class="form-control" id="days" placeholder="days" value="" >
        </div>	
    </div>
    <?php # /days ?>

    <?php # rate ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="rate"><?php _t("Rate"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="rate" class="form-control" id="rate" placeholder="rate" value="" >
        </div>	
    </div>
    <?php # /rate ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="total" class="form-control" id="total" placeholder="total" value="" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # retention ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="retention"><?php _t("Retention"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="retention" class="form-control" id="retention" placeholder="retention" value="" >
        </div>	
    </div>
    <?php # /retention ?>

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
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Search"); ?>">
        </div>      							
    </div>      							

</form>
