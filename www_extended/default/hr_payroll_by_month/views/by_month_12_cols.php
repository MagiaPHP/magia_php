<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-0 col-lg-0">
        <?php //include view("hr_payroll_by_month", "izq_by_month"); ?>

        <?php // include view("hr_payroll", "izq"); ?>

    </div>

    <div class="col-sm-12 col-md-12 col-lg-12">

        <?php include view("hr_payroll_by_month", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
        if (isset($fix_date) && $fix_date['fix']) {
            message('info', 'You have a fixed date activated');
        }
        ?>


        <?php include view("hr_payroll_by_month", "tabs"); ?>

        


        <?php
        include "table_by_month.php";
        ?>





    </div>
</div>

<?php include view("home", "footer"); ?> 
