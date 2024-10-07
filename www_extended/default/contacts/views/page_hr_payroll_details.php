<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-7 col-md-7 col-lg-7">

        <?php // include view("contacts", "nav_system"); ?>  
        <?php
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }
        ?>

        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>

        <?php
        // si es empleado aparece esto 
        include view('hr', 'tabs_hr');
        ?>


        <div class="panel panel-default">
            <div class="panel-body text-center">
                <b><?php _t("Payroll number"); ?></b> : <?php echo $hr_payroll->getId(); ?>
            </div>
        </div>



        <?php
        /**
         * 
          <form class="form-inline">

          <input type="hidden" name="c" value="contacts">
          <input type="hidden" name="a" value="hr_payroll">
          <input type="hidden" name="id" value="<?php echo $id; ?>">


          <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3"></label>
          <select class="form-control" name="month">
          <?php
          for ($m = 1; $m < 13; $m++) {
          $month_selected = ($m == $month) ? " selected " : "";
          echo '<option value="' . $m . '" ' . $month_selected . '>' . $m . ' : ' . magia_dates_month($m) . '</option>';
          }
          ?>
          </select>
          </div>

          <div class="form-group">
          <label class="sr-only" for="exampleInputEmail3">Email address</label>
          <select class="form-control" name="year">
          <?php
          for ($y = 2020; $y < date('Y') + 1; $y++) {
          $year_selected = ($y == $year) ? " selected " : "";
          echo '<option value="' . $y . '" ' . $year_selected . '>' . $y . '</option>';
          }
          ?>
          </select>
          </div>



          <button type="submit" class="btn btn-default">
          <?php echo icon("refresh"); ?>
          <?php _t("Update"); ?>
          </button>
          </form>
         */
        ?>

        <br>


        <?php include view('hr_payroll', 'details_header'); ?>



        <a href="index.php?c=_options&a=ok_push&option=contacts_hr_payroll_details&data=2&redi[redi]=5&redi[c]=contacts&redi[a]=hr_payroll_details&redi[params]=<?php echo urlencode("payroll_id=$payroll_id&id=$id"); ?>">
            m1
        </a>

        <a href="index.php?c=_options&a=ok_push&option=contacts_hr_payroll_details&data=1&redi[redi]=5&redi[c]=contacts&redi[a]=hr_payroll_details&redi[params]=<?php echo urlencode("payroll_id=$payroll_id&id=$id"); ?>">
            m2
        </a>

        <?php
        vardump(_options_option('contacts_hr_payroll_details'));
        ?>


        <?php include view('hr_payroll', 'details_items'); ?>


        <div class="panel panel-default">
            <div class="panel-body text-center">
                <b><?php _t("Paid to"); ?></b> : ING - 0120210210021 -- 111111 -- 22222
            </div>
        </div>








    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php
        include "der_hr_payroll_details.php";
        ?>                    
    </div>

</div>
<?php include view("home", "footer"); ?>  
