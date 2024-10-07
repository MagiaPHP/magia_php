<?php include view("home", "header"); ?>  
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("hr_employee_payroll_items", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">

        <?php
        include "hr_nav.php";
        ?>

        <?php  include view("hr_payroll_by_month", "tabs"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        include "hr_table_index.php";
        ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 
