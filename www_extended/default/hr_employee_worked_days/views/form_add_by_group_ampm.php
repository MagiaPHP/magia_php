<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">

    <?php
    $redi = ($c == 'hr_employee_worked_days') ? 1 : 5;
    ?>
    <input type="hidden" name="redi[redi]" value="<?php echo $redi; ?>">

    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_worked_days">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id&month=$month&year=$year"; ?>">


    <?php
    $config_hr_employee_worked_days_json = _options_option('config_hr_employee_worked_days');

    $config_hr_employee_worked_days = (is_json($config_hr_employee_worked_days_json)) ? json_decode($config_hr_employee_worked_days_json, true) : [];

    $config_hr_employee_worked_days_minute_ranges = ($config_hr_employee_worked_days['minute_ranges']) ? $config_hr_employee_worked_days['minute_ranges'] : 15;

    $redi = ($c == 'hr_employee_worked_days') ? 1 : 5;
    ?>


    <?php
//    $config_hr_employee_worked_days_json = _options_option('config_hr_employee_worked_days');
//
//    $config_hr_employee_worked_days = (is_json($config_hr_employee_worked_days_json)) ? json_decode($config_hr_employee_worked_days_json, true) : [];
//
//    foreach (employees_list_by_company($u_owner_id) as $key => $employee_item) {
//
//        $employee_checked = ( isset($employees_list_by_day) && !in_array($employee_item['contact_id'], $employees_list_by_day)) ? " checked " : "";
//
//        $employee_checked = ( isset($id) && $id == $employee_item['contact_id'] ) ? ' checked ' : '';
//
//        echo '<div class="form-group">
//                <label class="control-label col-sm-3" for="date"></label>
//                <div class="col-sm-8">
//                    <div class="checkbox">
//                        <label>
//                            <input 
//                            type="checkbox" 
//                            name="employee_ids[]" 
//                            
//                            value="' . $employee_item['contact_id'] . '" ' . $employee_checked . '> ' . contacts_formated($employee_item['contact_id']) . '
//                        </label>
//                    </div>
//                </div>	
//            </div>';
//    }
    ?>





    <?php # date          ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="" >
        </div>	
    </div>
    <?php # /date           ?>


    <?php # start_am        ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_am"><?php _t("Morning"); ?></label>
        <div class="col-sm-8">

            <select class="form-control" name="start_am">   

                <?php
                echo magia_time_select_generator(
                        $config_hr_employee_worked_days['start_time_day'],
                        $config_hr_employee_worked_days['end_time_day'],
                        $config_hr_employee_worked_days['minute_ranges'],
                        '08:00:00'
                );
                ?>




            </select>
        </div>	
    </div>
    <?php # /start_am                ?>

    <?php # end_am              ?>
    <div class="form-group">
        <label class="control-label col-sm-3 " for="end_am"></label>
        <div class="col-sm-8">
            <select class="form-control" name="end_am">
                <option value="00:00:00"><?php echo _t("Select one"); ?></option>
                <?php
                /**
                 *  
                  <?php
                  for ($h = $config_hr_employee_worked_days_start_time_day; $h <= $config_hr_employee_worked_days_end_time_day; $h++) {

                  for ($m = 0; $m <= 59; $m = $m + $config_hr_employee_worked_days_minute_ranges) {

                  $minute = str_pad($m, 2, '0', STR_PAD_LEFT);
                  $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
                  $selected_end_am = ($h == 13 && $m == 0 ) ? " selected " : "";
                  echo '<option value="' . $h . ':' . $m . ':00" ' . $selected_end_am . '>' . $hour . ' : ' . $minute . '</option>';
                  }
                  }
                  ?>
                 */
                ?>
                <?php
                echo magia_time_select_generator(
                        $config_hr_employee_worked_days['start_time_day'],
                        $config_hr_employee_worked_days['end_time_day'],
                        $config_hr_employee_worked_days['minute_ranges'],
                        '11:00:00'
                );
                ?>
            </select>

        </div>	
    </div>
    <?php
# /end_am   
#            
    ?>


    <?php
    /**
     *     <?php # lunch     ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="lunch"><?php _t("Lunch break"); ?></label>
      <div class="col-sm-8">
      <select class="form-control" name="lunch">
      <?php
      for ($h = $config_hr_employee_worked_days['start_time_day']; $h <= $config_hr_employee_worked_days['end_time_day']; $h++) {
      for ($m = 0; $m <= 59; $m = $m + $config_hr_employee_worked_days['minute_ranges']) {
      $minute = str_pad($m, 2, '0', STR_PAD_LEFT);
      $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
      $selected_lunch = ($h == 1 && $m == 0 ) ? " selected " : "";
      echo '<option value="' . $h . ':' . $m . ':00" ' . $selected_lunch . '>' . $hour . ' : ' . $minute . '</option>';
      }
      }
      ?>
      </select>
      </div>
      </div>
      <?php # /lunch      ?>
     * 
     */
    ?>


    <?php
# start_pm
#              
    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_pm"><?php _t("Afternoon"); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="start_pm">
                <option value="00:00:00"><?php echo _t("Select one"); ?></option>
                <?php
                /**
                 * 
                  <?php
                  for ($h = $config_hr_employee_worked_days_start_time_day; $h <= $config_hr_employee_worked_days_end_time_day; $h++) {

                  for ($m = 0; $m <= 59; $m = $m + $config_hr_employee_worked_days_minute_ranges) {

                  $minute = str_pad($m, 2, '0', STR_PAD_LEFT);
                  $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
                  $selected_start_pm = ($h == 13 && $m == 0 ) ? " selected " : "";
                  echo '<option value="' . $h . ':' . $m . ':00" ' . $selected_start_pm . '>' . $hour . ' : ' . $minute . '</option>';
                  }
                  }
                  ?>


                 */
                ?>

                <?php
                echo magia_time_select_generator(
                        $config_hr_employee_worked_days['start_time_day'],
                        $config_hr_employee_worked_days['end_time_day'],
                        $config_hr_employee_worked_days['minute_ranges'],
                        '11:00:00'
                );
                ?>

            </select>


        </div>	
    </div>
    <?php
# /start_pm
#               
    ?>



    <?php
# end_pm
#               
    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_pm"></label>
        <div class="col-sm-8">
            <select class="form-control" name="end_pm">
                <option value="00:00:00"><?php echo _t("Select one"); ?></option>
                <?php
                /**
                 *            
                  <?php
                  for ($h = $config_hr_employee_worked_days_start_time_day; $h <= $config_hr_employee_worked_daysend_time_day; $h++) {
                  for ($m = 0; $m <= 59; $m = $m + $config_hr_employee_worked_days['minute_ranges']) {
                  $minute = str_pad($m, 2, '0', STR_PAD_LEFT);
                  $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
                  $selected_end_pm = ($h == 17 && $m == 0 ) ? " selected " : "";
                  echo '<option value="' . $h . ':' . $m . ':00" ' . $selected_end_pm . '>' . $hour . ' : ' . $minute . '</option>';
                  }
                  }
                  ?>

                 */
                ?>


                <?php
                echo magia_time_select_generator(
                        $config_hr_employee_worked_days['start_time_day'],
                        $config_hr_employee_worked_days['end_time_day'],
                        $config_hr_employee_worked_days['minute_ranges'],
                        '17:00:00'
                );
                ?>

            </select>


        </div>	
    </div>
    <?php # /end_pm
    ?>




    <?php if (modules_field_module('status', 'projects')) { ?>

        <?php # project_id                ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="project_id"><?php _t("Project"); ?></label>
            <div class="col-sm-8">
                <select name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true" >

                    <?php
                    foreach (projects_list() as $key => $project) {

                        echo '<option value="' . $project['id'] . '">' . $project['name'] . ' | ' . contacts_formated($project['contact_id']) . '</option>';
                    }
                    ?>

                    <?php //  projects_select("id", array("name"), "", array());               ?>   

                </select>
            </div>	
        </div>

        <?php
        # /project_id 
        #   
        ?>

    <?php } else { ?>
        <input type="hidden" name="project_id" id="project_id" value="null">
    <?php }
    ?>







    <?php
# notes 
#                
    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="" ></textarea>  

        </div>	
    </div>
    <?php
# /notes 
#                   
    ?>



    <?php
    $config_hr_employee_worked_days_json = _options_option('config_hr_employee_worked_days');
    $config_hr_employee_worked_days = (is_json($config_hr_employee_worked_days_json)) ? json_decode($config_hr_employee_worked_days_json, true) : [];

// Agrega el checkbox "Select All"
    echo '<div class="form-group">
        <label class="control-label col-sm-3" for="select_all"></label>
        <div class="col-sm-8">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="select_all"> ' . _tr("Select all") . '
                </label>
            </div>
        </div>
    </div>';

// Genera los checkboxes de empleados
    foreach (employees_list_by_company($u_owner_id) as $key => $employee_item) {
        $employee_checked = (isset($employees_list_by_day) && !in_array($employee_item['contact_id'], $employees_list_by_day)) ? " checked " : "";
        $employee_checked = (isset($id) && $id == $employee_item['contact_id']) ? ' checked ' : '';

        echo '<div class="form-group">
            <label class="control-label col-sm-3" for="date"></label>
            <div class="col-sm-8">
                <div class="checkbox">
                    <label>
                        <input 
                        type="checkbox" 
                        class="employee_checkbox" 
                        name="employee_ids[]" 
                        value="' . $employee_item['contact_id'] . '" ' . $employee_checked . '> ' . contacts_formated($employee_item['contact_id']) . '
                    </label>
                </div>
            </div>    
        </div>';
    }
    ?>
    <script>
        document.getElementById('select_all').addEventListener('change', function () {
            // Obtener todos los checkboxes de empleados
            var checkboxes = document.querySelectorAll('.employee_checkbox');
            // Iterar sobre los checkboxes para seleccionarlos o deseleccionarlos según el estado del "Select All"
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = this.checked;
            }, this);
        });
    </script>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
