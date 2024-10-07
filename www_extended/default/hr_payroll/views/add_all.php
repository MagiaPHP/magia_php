<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("hr_payroll", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("hr_payroll", "nav"); ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php // include view("hr_payroll", "top"); ?>

        <h1>Lista de obreros que tiene horas trabajadas en xxxxx / 2024</h1>


        <?php
        include view("hr_payroll", "form_add_all");

        include "table_add_all.php";
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
