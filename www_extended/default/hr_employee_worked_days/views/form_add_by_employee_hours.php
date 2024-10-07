<?php
# MagiaPHP 
# file date creation: 2024-05-30 
//$minute_ranges = 30;
//$start_time_day = 0;
//$end_time_day = 23;
?> 
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="ok_add_by_project">

    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
        <input type="hidden" name="employee_ids[]" value="<?php echo $id; ?>">
        
        


    <?php
    $config_hr_employee_worked_days_json = _options_option('config_hr_employee_worked_days');

    $config_hr_employee_worked_days = (is_json($config_hr_employee_worked_days_json)) ? json_decode($config_hr_employee_worked_days_json, true) : [];

    $config_hr_employee_worked_days_minute_ranges = ($config_hr_employee_worked_days['minute_ranges']) ? $config_hr_employee_worked_days['minute_ranges'] : 15;

    $redi = ($c == 'hr_employee_worked_days') ? 1 : 5;
    ?>

    <input type="hidden" name="redi[redi]" value="<?php echo $redi; ?>">


    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_worked_days">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id&month=$month&year=$year"; ?>">



    <?php # date       ?>
    <div class="form-group">
        <div class="col-sm-12">
            <input 
                type="date" 
                name="date" 
                class="form-control" 
                id="date" 
                placeholder="date" 
                value="<?php //echo $line['date'];             ?>" 
                required=""
                >
        </div>	
    </div>
    <?php # /date           ?>





    <div class="form-group">
        <div class="col-sm-6">
            <select class="form-control" name="total_hours">
                <option value="null"><?php _t("Registre hours later"); ?></option>
              

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



        <?php if (modules_field_module('status', 'projects')) {
            ?>
            <?php
            # project_id
            #           
            ?>
            <div class="col-sm-6">
                <select name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true" >
                    <?php
                    foreach (projects_list() as $key => $project) {
                        echo '<option value="' . $project['id'] . '">' . $project['name'] . ' | ' . contacts_formated($project['contact_id']) . '</option>';
                    }
                    ?>
                    <?php //  projects_select("id", array("name"), "", array());      ?>                        
                </select>
            </div>	
        <?php } else { ?> 
            <input type="hidden" name="project_id" id="project_id" value="null">
        <?php } ?>



    </div>
    <?php
# /project_id
#            
    ?>


    <?php # notes                     ?>
    <div class="form-group">
        <div class="col-sm-12">
            <textarea name="notes" class="form-control" id="notes" placeholder="<?php _t("Notes"); ?>" ></textarea>  
        </div>	
    </div>
    <?php # /notes                       ?>


    



    <div class="form-group">
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							



</form>

