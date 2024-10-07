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
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $hr_employee_worked_days->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # employee_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t("Employee_id"); ?></label>
        <div class="col-sm-8">
               <select name="employee_id" class="form-control selectpicker" id="employee_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                employees_select("contact_id", array("contact_id"), $hr_employee_worked_days->getEmployee_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /employee_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="<?php echo $hr_employee_worked_days->getDate(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # start_am ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_am"><?php _t("Start_am"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="start_am" class="form-control" id="start_am" placeholder="start_am"  value="<?php echo $hr_employee_worked_days->getStart_am(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /start_am ?>

    <?php # end_am ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_am"><?php _t("End_am"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="end_am" class="form-control" id="end_am" placeholder="end_am"  value="<?php echo $hr_employee_worked_days->getEnd_am(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /end_am ?>

    <?php # lunch ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="lunch"><?php _t("Lunch"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="lunch" class="form-control" id="lunch" placeholder="lunch"  value="<?php echo $hr_employee_worked_days->getLunch(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /lunch ?>

    <?php # start_pm ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_pm"><?php _t("Start_pm"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="start_pm" class="form-control" id="start_pm" placeholder="start_pm"  value="<?php echo $hr_employee_worked_days->getStart_pm(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /start_pm ?>

    <?php # end_pm ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_pm"><?php _t("End_pm"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="end_pm" class="form-control" id="end_pm" placeholder="end_pm"  value="<?php echo $hr_employee_worked_days->getEnd_pm(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /end_pm ?>

    <?php # total_hours ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total_hours"><?php _t("Total_hours"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="total_hours" class="form-control" id="total_hours" placeholder="total_hours"  value="<?php echo $hr_employee_worked_days->getTotal_hours(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /total_hours ?>

    <?php # project_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="project_id"><?php _t("Project_id"); ?></label>
        <div class="col-sm-8">
               <select name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                projects_select("id", array("id"), $hr_employee_worked_days->getProject_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /project_id ?>

    <?php # notes ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea"  disabled="" ><?php echo $hr_employee_worked_days->getNotes(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /notes ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $hr_employee_worked_days->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
               <select name="status" class="form-control selectpicker" id="status" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                hr_worked_days_status_select("code", array("code"), $hr_employee_worked_days->getStatus() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /status ?>

    <?php # year ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="year"><?php _t("Year"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="year" class="form-control" id="year" placeholder="year"  value="<?php echo $hr_employee_worked_days->getYear(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /year ?>

    <?php # month ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="month"><?php _t("Month"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="month" class="form-control" id="month" placeholder="month"  value="<?php echo $hr_employee_worked_days->getMonth(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /month ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

