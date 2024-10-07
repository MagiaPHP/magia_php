<?php include view("home", "header"); ?>  

<?php include view("pettycash", "nav"); ?>


<div class="row">

    <div class="col-sm-12 col-md-8 col-lg-8">



        <?php
        /**
         * 

          <form class="form-inline" method="get" action="index.php">
          <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Email address</label>
          <select class="form-control" name="month">
          <?php
          for ($month = 1; $month < 12; $month++) {
          $selected = ($month == date('m'))? " selected ":"";
          echo '<option value="' . $month . '"  '.$selected.'>' . _tr(magia_dates_month($month)) . '</option>';
          }
          ?>
          </select>
          </div>
          <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Email address</label>
          <select class="form-control" name="year">
          <?php
          for ($year = 2024; $year < 2030; $year++) {
          $selected = ($year == date('Y'))? " selected ":"";
          echo '<option value="' . $year . '"  '.$selected.'>' . (($year)) . '</option>';
          }
          ?>
          </select>
          </div>
          <button type="submit" class="btn btn-default">
          <?php _t("Change"); ?>
          </button>
          </form>

          <br>

         */
        ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php
        if ($pettycash) {
            include view("pettycash", "table_index");
        } else {
            message("info", "No items");
        }
        ?>

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


    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
        <?php include "der_index.php"; ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 
