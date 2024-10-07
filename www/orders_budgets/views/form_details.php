<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="orders_budgets">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$orders_budgets[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # order_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_id" name="order_id" class="form-control"  id="order_id" placeholder="order_id" value="<?php echo "$orders_budgets[order_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_id ?>

    <?php # budget_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Budget_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="budget_id" name="budget_id" class="form-control"  id="budget_id" placeholder="budget_id" value="<?php echo "$orders_budgets[budget_id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # budget_id ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="date_registre" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="<?php echo "$orders_budgets[date_registre]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # date_registre ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$orders_budgets[order_by]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$orders_budgets[status]"; ?>" disabled="" >
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

