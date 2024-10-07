<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include "izq_details_contact.php"; ?>
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


        <h4>


            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
            }
            ?>


            <?php // _t('Payroll'); ?>
        </h4>





        <form class="form-inline">

            <input type="hidden" name="c" value="contacts">
            <input type="hidden" name="a" value="hr_payroll">
            <input type="hidden" name="id" value="<?php echo $id; ?>">


            <?php
            /**
             *             <div class="form-group">
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

             */
            ?>
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <select class="form-control" name="year">
                    <?php
                    $hr_payroll_min_year = hr_payroll_min_year() ?? date("Y");

                    for ($y = $hr_payroll_min_year; $y <= date('Y'); $y++) {

                        $year_selected = ($y == $year) ? " selected " : "";

                        echo '<option value="' . $y . '" ' . $year_selected . '>' . $y . '</option>';
                    }
                    ?>
                </select>
            </div>



            <button type="submit" class="btn btn-default">
<?php echo icon("refresh"); ?> 
<?php _t("Change"); ?>
            </button>
        </form>

        <br>


<?php
if (!$hr_payroll) {
    message("info", "No items");
} else {
    //include "table_hr_payroll.php";
//            include view('hr_payroll', 'table_index');
    include "table_hr_payroll.php";
}

//vardump(hr_employee_benefits_field_by_employee_id_code('price', $id, '2100'));
?>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">        
<?php
include "der_hr_payroll.php";
?>                    
    </div>

</div>
<?php include view("home", "footer"); ?>  
