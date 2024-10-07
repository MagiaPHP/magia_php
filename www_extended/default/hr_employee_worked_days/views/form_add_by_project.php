<?php
# MagiaPHP 
# file date creation: 2024-05-30 
?>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="ok_add_by_project_small">
    <input type="hidden" name="employee_ids[]" value="<?php echo $id; ?>">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">

    <?php
    $redi = ($c == 'hr_employee_worked_days') ? 1 : 5;

    $config_hr_employee_worked_days_json = _options_option('config_hr_employee_worked_days');

    $config_hr_employee_worked_days = (is_json($config_hr_employee_worked_days_json)) ? json_decode($config_hr_employee_worked_days_json, true) : [];
    ?>
    <input type="hidden" name="redi[redi]" value="<?php echo $redi; ?>">


    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_worked_days">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id&month=$month&year=$year"; ?>">



    <?php # date    ?>
    <div class="form-group">
        <div class="col-sm-12">
            <input 
                type="date" 
                name="date" 
                class="form-control" 
                id="date" 
                placeholder="date" 
                value="" 
                required=""
                >
        </div>	
    </div>
    <?php # /date    ?>



    <?php # project_id        ?>
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



                <?php
//                $selected_total_hours = null;
//
//                // www_extended/defaul/hr_employee_worked_days/config.php
//
//                for ($h = $config_hr_employee_worked_days['start_time_day']; $h <= $config_hr_employee_worked_days['end_time_day']; $h++) {
//
//                    for ($m = 0; $m <= 59; $m = $m + $config_hr_employee_worked_days['minute_ranges']) {
//
//                        $minute = str_pad($m, 2, '0', STR_PAD_LEFT);
//
//                        $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
//
//                        $selected_total_hours = ($h == substr($line['total_hours'], 0, 2) && $m == substr($line['total_hours'], 3, 2) ) ? " selected " : "";
//
//                        echo '<option value="' . $h . ':' . $m . ':00" ' . $selected_total_hours . '>' . $h . ' : ' . str_pad($m, 2, '0') . '</option>';
//                    }
//                }
                ?>
            </select>





        </div>	


        <div class="col-sm-6">
            <select name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true" >
                <?php
                foreach (projects_list() as $key => $project) {
                    echo '<option value="' . $project['id'] . '">' . $project['name'] . ' | ' . contacts_formated($project['contact_id']) . '</option>';
                }
                ?>

                <?php //  projects_select("id", array("name"), "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /project_id        ?>

    <?php # notes         ?>
    <div class="form-group">

        <div class="col-sm-12">
            <textarea name="notes" class="form-control" id="notes" placeholder="<?php _t("Notes"); ?>" ></textarea>  
        </div>	
    </div>
    <?php # /notes          ?>




    <div class="form-group">
        <div class="col-sm-12">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
