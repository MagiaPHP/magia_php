<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("hr_employee_worked_days", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-7 col-lg-7">

        <?php include view("hr_employee_worked_days", "nav"); ?>

        <?php
        if (isset($fix_date['fix']) && $fix_date['fix']) {
            message('info', 'You have a fixed date activated');
        }
        ?>

        <div class="row">
            <div class="col-sm-12 col-md-2 col-lg-2">
                <?php
                /**
                 *
                 * <a href="index.php?c=hr_employee_worked_days&a=search&w=by_date&date_start=<?php echo ($date_remove_1); ?>&date_end=xxxxx">
                  <?php echo icon("chevron-left"); ?>
                  <?php echo magia_dates_formated($date_remove_1); ?>

                  </a>
                 */
                ?>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 text-center">
                <h4>
                    <?php echo magia_dates_formated($date_start); ?>

                    <?php
                    if ($date_end) {
                        echo " - ";

                        echo magia_dates_formated($date_end);
                    }
                    ?>

                </h4>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 text-right">

                <?php
                /**
                 * <a href="index.php?c=hr_employee_worked_days&a=search&w=by_date&date=<?php echo ($date_plus_1); ?>">
                  <?php echo magia_dates_formated($date_plus_1); ?>
                  <?php echo icon("chevron-right"); ?>
                  </a>

                 * 
                 */
                ?>

            </div>
        </div>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php // include view("hr_employee_worked_days", "top"); ?>

        <?php
        //vardump($hr_employee_worked_days); 

        if ($hr_employee_worked_days) {
            include "table_index.php";
        } else {
            message("info", "No items");
        }
        ?>

        <?php // include "table_stats.php";  ?>

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

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "der_index.php"; ?>
    </div>

</div>

<?php include view("home", "footer"); ?> 
