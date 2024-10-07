<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:42 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start employee_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t(ucfirst("employee_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="employee_id" class="form-control selectpicker" id="employee_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                employees_select("contact_id", array("contact_id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end employee_id -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
</div>
    </div>
    <!-- mg_end date -->

    <!-- mg_start start_am -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_am"><?php _t(ucfirst("start_am")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="start_am" class="form-control" id="start_am" placeholder="start_am"  value="" >
<p class="help-block"><?php echo _tr("Job start Time 08h30"); ?></p></div>
    </div>
    <!-- mg_end start_am -->

    <!-- mg_start end_am -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_am"><?php _t(ucfirst("end_am")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="end_am" class="form-control" id="end_am" placeholder="end_am"  value="" >
<p class="help-block"><?php echo _tr("Job End Time 10h30"); ?></p></div>
    </div>
    <!-- mg_end end_am -->

    <!-- mg_start lunch -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="lunch"><?php _t(ucfirst("lunch")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="lunch" class="form-control" id="lunch" placeholder="lunch"  value="" >
</div>
    </div>
    <!-- mg_end lunch -->

    <!-- mg_start start_pm -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_pm"><?php _t(ucfirst("start_pm")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="start_pm" class="form-control" id="start_pm" placeholder="start_pm"  value="" >
</div>
    </div>
    <!-- mg_end start_pm -->

    <!-- mg_start end_pm -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_pm"><?php _t(ucfirst("end_pm")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="end_pm" class="form-control" id="end_pm" placeholder="end_pm"  value="" >
</div>
    </div>
    <!-- mg_end end_pm -->

    <!-- mg_start total_hours -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="total_hours"><?php _t(ucfirst("total_hours")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="total_hours" class="form-control" id="total_hours" placeholder="total_hours"  value="" >
</div>
    </div>
    <!-- mg_end total_hours -->

    <!-- mg_start project_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="project_id"><?php _t(ucfirst("project_id")); ?> </label>
        <div class="col-sm-8">               <select name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                projects_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end project_id -->

    <!-- mg_start notes -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t(ucfirst("notes")); ?> </label>
        <div class="col-sm-8">            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end notes -->

    <!-- mg_start order_by -->
    <!-- mg_start status -->
    <!-- mg_start year -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="year"><?php _t(ucfirst("year")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="year" class="form-control" id="year" placeholder="year"  value="" >
</div>
    </div>
    <!-- mg_end year -->

    <!-- mg_start month -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="month"><?php _t(ucfirst("month")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="month" class="form-control" id="month" placeholder="month"  value="" >
</div>
    </div>
    <!-- mg_end month -->

  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
