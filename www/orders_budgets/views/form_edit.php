<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="orders_budgets">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # order_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_id"><?php _t("Order_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_id" class="form-control"  id="order_id" placeholder="order_id" value="<?php echo "$orders_budgets[order_id]"; ?>" >
        </div>	
    </div>
    <?php # /order_id ?>

    <?php # budget_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="budget_id"><?php _t("Budget_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="budget_id" class="form-control"  id="budget_id" placeholder="budget_id" value="<?php echo "$orders_budgets[budget_id]"; ?>" >
        </div>	
    </div>
    <?php # /budget_id ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="<?php echo "$orders_budgets[date_registre]"; ?>" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$orders_budgets[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$orders_budgets[status]"; ?>" >
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

