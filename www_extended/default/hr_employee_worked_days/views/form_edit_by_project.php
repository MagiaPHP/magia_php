<?php
# MagiaPHP 
# file date creation: 2024-05-30 
//$minute_ranges = 30;
//$start_time_day = 0;
//$end_time_day = 23;
//vardump($line);
//vardump($config_hr_employee_worked_days);
//vardump($line['id']); 

//$config_hr_employee_worked_days = json_decode(_options_option('config_hr_employee_worked_days'), true);
?>

<?php
$config_hr_employee_worked_days_json = _options_option('config_hr_employee_worked_days');

$config_hr_employee_worked_days = (is_json($config_hr_employee_worked_days_json)) ? json_decode($config_hr_employee_worked_days_json, true) : [];

$config_hr_employee_worked_days_minute_ranges = ($config_hr_employee_worked_days['minute_ranges']) ? $config_hr_employee_worked_days['minute_ranges'] : 15;

$redi = ($c == 'hr_employee_worked_days') ? 1 : 5;
?>




<form class="form-horizontal" action="index.php" method="post" >

    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="ok_edit_by_project_small">

    <input type="hidden" name="id" value="<?php echo $line['id']; ?>">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_worked_days">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id&month=$month&year=$year"; ?>">



    <?php # date          ?>
    <div class="form-group">
        <div class="col-sm-12">
            <input 
                type="date" 
                name="date" 
                class="form-control" 
                id="date" 
                placeholder="date" 
                value="<?php echo $line['date']; ?>" 
                required=""
                readonly=""
                >
        </div>	
    </div>
    <?php # /date          ?>

    <div class="form-group">
        <div class="col-sm-6">

            <select class="form-control" name="total_hours">
                <option value="null"><?php _t("Registre hours later"); ?></option>
                <?php
//                $selected_total_hours = null;
//
//                for ($h = 0; $h <= 23; $h++) {
//
//                    for ($m = 0; $m <= 59; $m = $m + $config_hr_employee_worked_days['minute_ranges']) {
//
//                        $minute = str_pad($m, 2, '0', STR_PAD_LEFT);
//
//                        $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
//
//                        //$selected_total_hours = ($h == substr($line['total_hours'], 0, 2) && $m == substr($line['total_hours'], 3, 2) ) ? " selected " : "";
//                        
//                        $selected_total_hours = ( "{$hour}:{$minute}:00" == $line['total_hours']) ? " selected " : "";
//
//                        echo '<option value="' . $h . ':' . $m . ':00" ' . $selected_total_hours . '>' . $hour . ' : ' . $minute . '</option>';
//                    }
//                }
                ?>

                <?php
                echo magia_time_select_generator(
                        $config_hr_employee_worked_days['start_time_day'],
                        $config_hr_employee_worked_days['end_time_day'],
                        $config_hr_employee_worked_days['minute_ranges'], // 30
                        $line['total_hours'] ?? '08:00:00'
                );
                ?>


            </select>




        </div>	
        <div class="col-sm-6">
            <select name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true" >
                <?php
                foreach (projects_list() as $key => $project) {

                    $selected_project = (isset($line['project_id']) && $line['project_id'] == $project['id'] ) ? " selected " : null;

                    echo '<option value="' . $project['id'] . '" ' . $selected_project . ' >' . $project['name'] . ' | ' . contacts_formated($project['contact_id']) . '</option>';
                }
                ?>

                <?php //  projects_select("id", array("name"), "", array());       ?>                        
            </select>
        </div>	
    </div>
    <?php # /project_id                 ?>

    <?php # notes               ?>
    <div class="form-group">

        <div class="col-sm-12">
            <textarea name="notes" class="form-control" id="notes" placeholder="<?php _t("Notes"); ?>" ><?php echo $line['notes']; ?></textarea>  
        </div>	
    </div>
    <?php # /notes                    ?>




    <div class="form-group">
        <div class="col-sm-12">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
