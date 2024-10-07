<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
        /**
         *         <?php # SAVE ##################   ?>
          <div class="row">
          <div class="col-sm-12 col-md-3 col-lg-3">
          <?php include "part_details_company.php"; ?>
          </div>

          <div class="col-sm-12 col-md-3 col-lg-3">
          <?php include "part_details_dates.php"; ?>
          <?php include "part_date_expiration_update.php"; ?>
          </div>

          <div class="col-sm-12 col-md-3 col-lg-3">
          <?php include "part_details_billing_address.php"; ?>
          </div>

          <div class="col-sm-12 col-md-3 col-lg-3">
          <?php
          if (_options_option('config_address_use_delivery')) {
          include "part_details_delivery_address.php";
          }
          ?>
          </div>
          </div>
         */
        ?>





        <?php
        $transport_tvac = 0;

        switch ($invoices['type']) {
            case "I": // individual     
                include "short_items_individual.php";
//                include "part_items_add_individual.php";
                break;

            case "M": // Mensual
                echo '<table class="table table-striped"  >';
                //    include "tabla_items_monthly_edit.php";
                //    include "table_transport_montly.php";
                echo "</table>";

                include "table_form_items_monthly.php";
                // include "part_tva.php";
                break;

            default:
                include "short_items_individual.php";
//                include "short_part_items_add_individual.php";
//                include "part_items_add.php";
                break;
        }
        ?>



        <?php include "part_comments.php"; ?>


    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
</div>


