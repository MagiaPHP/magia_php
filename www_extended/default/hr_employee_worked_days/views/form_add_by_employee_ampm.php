<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">

    <input type="hidden" name="employee_ids[]" value="<?php echo $id; ?>">
    <?php
    $config_hr_employee_worked_days_json = _options_option('config_hr_employee_worked_days');

    $config_hr_employee_worked_days = (is_json($config_hr_employee_worked_days_json)) ? json_decode($config_hr_employee_worked_days_json, true) : [];

    $config_hr_employee_worked_days_minute_ranges = ($config_hr_employee_worked_days['minute_ranges']) ? $config_hr_employee_worked_days['minute_ranges'] : 15;

    $redi = ($c == 'hr_employee_worked_days') ? 1 : 5;
    ?>




    <?php
    $redi = ($c == 'hr_employee_worked_days') ? 1 : 5;
    ?>
    <input type="hidden" name="redi[redi]" value="<?php echo $redi; ?>">

    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_worked_days">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id&month=$month&year=$year"; ?>">




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
# start_pm
#              
    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_pm"><?php _t("Afternoon"); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="start_pm">
                <option value="00:00:00"><?php echo _t("Select one"); ?></option>


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







    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
