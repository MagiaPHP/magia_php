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

        </h4>

        <?php
        if (isset($fix_date) && $fix_date['fix']) {
            message('info', 'You have a fixed date activated');
        }
        ?>


        <form class="form-inline">

            <input type="hidden" name="c" value="contacts">
            <input type="hidden" name="a" value="hr_employee_worked_days">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <?php
            /**
             * 
             *     <div class="form-group">
              <label class="sr-only" for="month"></label>
              <input type="date" class="form-control" name="date_start" value="">
              </div>

              <div class="form-group">
              <label class="sr-only" for="month"></label>
              <input type="date" class="form-control" name="date_end" value="">
              </div>

             */
            ?>


            <div class="form-group">
                <label class="sr-only" for="month"></label>
                <select class="form-control" name="month"
                <?php echo (isset($fix_date) && $fix_date['fix']) ? " disabled " : ""; ?>
                        >
                            <?php
                            for ($m = 1; $m < 13; $m++) {
                                $month_selected = ($m == $month) ? " selected " : "";
                                echo '<option value="' . $m . '" ' . $month_selected . '>' . _tr(magia_dates_month($m)) . '</option>';
                            }
                            ?>
                </select>
            </div>

            <div class="form-group">
                <label class="sr-only" for="year">year</label>
                <select class="form-control" name="year"
                <?php echo (isset($fix_date) && $fix_date['fix']) ? " disabled " : ""; ?>
                        >
                            <?php
                            $hr_employee_worked_days_min_year = hr_employee_worked_days_min_year() ?? date("Y");

                            for ($y = $hr_employee_worked_days_min_year; $y <= date('Y'); $y++) {
                                $year_selected = ($y == $year) ? " selected " : "";
                                echo '<option value="' . $y . '" ' . $year_selected . '>' . $y . '</option>';
                            }
                            ?>
                </select>
            </div>
            <button type="submit" class="btn btn-default"
            <?php echo (isset($fix_date) && $fix_date['fix']) ? " disabled " : ""; ?>
                    >
                        <?php echo icon("refresh"); ?> 
                        <?php _t("Change"); ?>
            </button>
        </form>



        <br>







        <?php
        /**
         *         
         * 
          <script>
          function sellectAll(source) {
          var checkboxes = document.querySelectorAll('input[type="checkbox"]');
          for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i] != source)
          checkboxes[i].checked = source.checked;
          }
          }
          </script>



         * <form method="post" action="index" class="form-inline">

          <input type="hidden" name="c" value="hr_employee_worked_days">
          <input type="hidden" name="a" value="ok_update_status">

          <input type="hidden" name="redi[redi]" value="5">
          <input type="hidden" name="redi[c]" value="projects">
          <input type="hidden" name="redi[a]" value="hours_worked">
          <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">
         * 
         * 
         */
        ?>

        <?php
        include "table_hr_employee_worked_days.php";
        ?>

        <?php
        /**
         *             
          <div class="form-group">
          <label for="ids"></label>
          <div class="checkbox">
          <label>
          <input type="checkbox" onclick="sellectAll(this);" /> <?php _t("Select all"); ?>
          </label>
          </div>
          </div>
          <div class="form-group">
          <label for="ids"></label>
          <select class="form-control" name="status" id="status">
          <option value="null"><?php _t("Select one"); ?></option>
          <?php
          foreach (hr_worked_days_status_list() as $key => $hrwsl) {
          echo '<option value="' . $hrwsl['code'] . '">' . $hrwsl['status_name'] . '</option>';
          }
          ?>
          </select>
          </div>
          <button type="submit" class="btn btn-default">
          <?php echo icon("ok"); ?>
          <?php _t("Submit"); ?>
          </button>
          </form>
         */
        ?>




        <br>
        <br>
        <br>





        <h4>
            <?php _t("List of holidays this month"); ?>: <?php echo _tr(magia_dates_month($month)); ?> <?php echo $year; ?>

            <a href="index.php?c=holidays"><?php echo icon('wrench'); ?></a>


        </h4>

        <?php
        if (!holidays_search_by_year_month($year, $month)) {
            //message('info', 'There are no holidays this month');
            echo '<p>' . _tr('There are no holidays this month') . '</p>';
        }
        ?>


        <ul>
            <?php
            foreach (holidays_search_by_year_month($year, $month) as $key => $hsbym) {
                echo '<li>' . $hsbym['date'] . ' - ' . $hsbym['description'] . '</li>';
            }
            ?>    
        </ul>








    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php
        include "der_hr_employee_worked_days.php";
        ?>                    
    </div>

</div>
<?php include view("home", "footer"); ?>  
