<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="projects_inout">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $projects_inout->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # project_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="project_id"><?php _t("Project_id"); ?></label>
        <div class="col-sm-8">
            <select name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true"  disabled="" >
                <?php projects_select("id", "id", $projects_inout->getProject_id(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /project_id ?>

    <?php # budget_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="budget_id"><?php _t("Budget_id"); ?></label>
        <div class="col-sm-8">
            <select name="budget_id" class="form-control selectpicker" id="budget_id" data-live-search="true"  disabled="" >
                <?php budgets_select("id", "id", $projects_inout->getBudget_id(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /budget_id ?>

    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="invoice_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">
            <select name="invoice_id" class="form-control selectpicker" id="invoice_id" data-live-search="true"  disabled="" >
                <?php invoices_select("id", "id", $projects_inout->getInvoice_id(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /invoice_id ?>

    <?php # expense_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="expense_id"><?php _t("Expense_id"); ?></label>
        <div class="col-sm-8">
            <select name="expense_id" class="form-control selectpicker" id="expense_id" data-live-search="true"  disabled="" >
                <?php expenses_select("id", "id", $projects_inout->getExpense_id(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /expense_id ?>

    <?php # value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="value" class="form-control" id="value" placeholder="value" value="<?php echo $projects_inout->getValue(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /value ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $projects_inout->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="status" class="form-control" id="status" placeholder="status" value="<?php echo $projects_inout->getStatus(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

