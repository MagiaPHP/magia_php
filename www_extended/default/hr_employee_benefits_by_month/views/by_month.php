<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("hr_employee_benefits_by_month", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("hr_employee_benefits_by_month", "nav"); ?>


        <?php
        if ($fix_date['fix']) {
            message('info', 'You have a fixed date activated');
        }
        ?>



        <?php include view("hr_payroll_by_month", "tabs"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <?php // include view("hr_employee_benefits_by_month", "top"); ?>





        <?php
        include "modal_calcule_worked_days.php";
        ?>



        <?php
        if ($hr_employee_benefits_by_month) {
            include view("hr_employee_benefits_by_month", "table_index_by_month");
        } else {
            message("info", "No items");
        }
        ?>


        <?php
        /**
         * 
          <div class="container-fluid">
          <div class="col-sm-12 col-md-6 col-lg-6">
          <?php
          $pagination->createHtml();
          ?>
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6 text-right">
          <?php
          include view($c, "form_pagination_items_limit");
          ?>
          </div>
          </div>
         */
        ?>





    </div>
</div>

<?php include view("home", "footer"); ?> 
