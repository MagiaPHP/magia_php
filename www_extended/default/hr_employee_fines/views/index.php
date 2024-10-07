<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("hr_employee_fines", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("hr_employee_fines", "nav"); ?>


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

        <?php // include view("hr_employee_fines", "top"); ?>
        <?php
//        if ($hr_employee_fines) {
//            include view("hr_employee_fines", "table_index_all");
//        } else {
//            message("info", "No items");
//        }

        include view("hr_employee_fines", "table_index_all");
        ?>


        <?php
        /**
         *         <div class="container-fluid">
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
