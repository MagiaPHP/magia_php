<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6"> 
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php _t("Budgets not invoiced"); ?>
            </div>
            <div class="panel-body">
                <?php
                include "table_budgets_not_invoiced.php";
                ?>        
            </div>
        </div> 
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">                
        <div class="panel panel-primary">
            <div class="panel-heading">
                <?php _t("Budgets on this invoice"); ?>
            </div>
            <div class="panel-body">                
                <?php include "budgets_on_this_invoice.php"; ?>
            </div>
        </div>
    </div>
</div>