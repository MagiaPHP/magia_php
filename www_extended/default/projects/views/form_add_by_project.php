
<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="ok_add_by_project">
    <input type="hidden" name="project_id" value="<?php echo $id; ?>">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="projects">
    <input type="hidden" name="redi[a]" value="hours_worked">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">



    <table class="table-condensed table">
        <?php
        foreach (employees_list_by_company($u_owner_id) as $key => $employe) {
            echo '<tr>
                    <td>
                        <label>
                            <input type="checkbox" name="employee_ids[]" value="' . $employe['contact_id'] . '"> ' . contacts_formated($employe['contact_id']) . '
                        </label>
                    </td>                    
                </tr>';
        }
        ?>
    </table>



    <?php # date  ?>
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
    <?php # /date  ?>



    <?php # project_id      ?>
    <div class="form-group">
        <div class="col-sm-6">
            <?php
            // Obtenemos el valor de la opción de configuración como un array decodificado JSON.
            $config_hr_employee_worked_days_json = _options_option('config_hr_employee_worked_days') ?: '';

            // Verifica si la cadena es un JSON válido y decodifica. Si no es válido, asigna un array vacío.
            $config_hr_employee_worked_days = is_json($config_hr_employee_worked_days_json) ? json_decode($config_hr_employee_worked_days_json, true) : [];
            
            
            
            
            ?>

            <select class="form-control" name="total_hours">
                <option value="null"><?php _t("Registre hours later"); ?></option>



                <?php
                echo magia_time_select_generator($config_hr_employee_worked_days['start_time_day'], $config_hr_employee_worked_days['end_time_day'], $config_hr_employee_worked_days['minute_ranges']);
                ?>




                <?php
//                for ($h = 0; $h <= 23; $h++) {
//
//                    for ($m = 0; $m <= 59; $m = $m + $minute_ranges) {
//
//                        $minute = str_pad($m, 2, '0', STR_PAD_LEFT);
//
//                        $hour = str_pad($h, 2, '0', STR_PAD_LEFT);
//
//                        $selected_start_am = ($h == 8 && $m == 0 ) ? " selected " : "";
//
//                        echo '<option value="' . $h . ':' . $m . ':00" ' . $selected_start_am . '>' . $hour . ' : ' . $minute . '</option>';
//                    }
//                }
                ?>
            </select>
        </div>	


        <div class="col-sm-6">
            <select name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true" >
                <?php
                foreach (projects_list() as $key => $project) {

                    $project_selected = ($project['id'] == $id ) ? ' selected ' : '';

                    echo '<option value="' . $project['id'] . '" ' . $project_selected . '>' . $project['name'] . ' | ' . contacts_formated($project['contact_id']) . '</option>';
                }
                ?>

            </select>
        </div>	
    </div>
    <?php # /project_id              ?>

    <?php # notes              ?>
    <div class="form-group">

        <div class="col-sm-12">
            <textarea name="notes" class="form-control" id="notes" placeholder="<?php _t("Notes"); ?>" ></textarea>  
        </div>	
    </div>
    <?php # /notes                  ?>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Submit"); ?>
    </button>


</form>


