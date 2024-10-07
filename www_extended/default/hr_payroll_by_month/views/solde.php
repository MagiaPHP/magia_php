<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-0 col-md-0 col-lg-0">
        <?php //include view("hr_payroll_by_month", "izq_by_month"); ?>

        <?php //include view("hr_payroll", "izq"); ?>

    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        
        <?php include view("hr_payroll_by_month", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
        if ($fix_date['fix']) {
            message('info', 'You have a fixed date activated');
        }
        ?>

        <?php include view("hr_payroll_by_month", "tabs"); ?>

        <?php
        include "table_solde.php";
        ?>

    </div>

    <div class="col-sm-0 col-md-0 col-lg-0">
        <?php //include view("hr_payroll_by_month", "izq_by_month"); ?>
        <?php include "der_solde.php"; ?>
    </div>

</div>

<?php include view("home", "footer"); ?> 
