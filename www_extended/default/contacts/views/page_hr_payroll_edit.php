<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-sm-7 col-md-6 col-lg-6">

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
        // include view('hr', 'tabs_hr');
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
        <?php include view('hr_payroll', 'details_items_edit'); ?>


        <div class="panel panel-default">
            <div class="panel-body">

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    <?php echo _t("Change"); ?>
                </button>


                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">
                                    <?php _t("Change account number"); ?>
                                </h4>
                            </div>
                            <div class="modal-body">


                                <?php _t("Change the bank account where the payment will be made"); ?>




                            </div>
                            <div class="modal-footer">                                

                                <a href="index.php?c=contacts&a=banks&id=<?php echo $hr_payroll->getEmployee_id(); ?>"><?php _t("Add new account"); ?></a>


                            </div>
                        </div>
                    </div>
                </div>



                <b><?php _t("Paid to"); ?></b> : ING - 0120210210021 -- 111111 -- 22222


            </div>
        </div>








    </div>

    <div class="col-sm-4 col-md-4 col-lg-4">        
        <?php
        include "der_hr_payroll_edit.php";
        ?>                    
    </div>

</div>
<?php include view("home", "footer"); ?>  
