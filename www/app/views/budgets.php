<?php include view("home", "header"); ?>  

<div class="container-fluid">
    
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <hr>
        <?php include view("app", "izq"); ?>
        <hr>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <div class="well text-center">
            <h1>
                <?php _t("Budget") ?>: <?php echo $budget->getId(); ?>
            </h1>
        </div>

        <?php include "part_budget.php"; ?>

        <?php include view('budgets', 'part_pay'); ?>

    </div>


    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php include view("app", "der_budgets"); ?>
    </div>
    
    
</div>

<?php include view("home", "footer"); ?>

