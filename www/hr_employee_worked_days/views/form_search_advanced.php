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
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # employee_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t("Employee_id"); ?></label>
        <div class="col-sm-8">
               <select name="employee_id" class="form-control selectpicker" id="employee_id" data-live-search="true" >
                    
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
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # start_am ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_am"><?php _t("Start_am"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="start_am" class="form-control" id="start_am" placeholder="start_am"  value="" >
        </div>	
    </div>
    <?php # /start_am ?>

    <?php # end_am ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_am"><?php _t("End_am"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="end_am" class="form-control" id="end_am" placeholder="end_am"  value="" >
        </div>	
    </div>
    <?php # /end_am ?>

    <?php # lunch ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="lunch"><?php _t("Lunch"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="lunch" class="form-control" id="lunch" placeholder="lunch"  value="" >
        </div>	
    </div>
    <?php # /lunch ?>

    <?php # start_pm ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_pm"><?php _t("Start_pm"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="start_pm" class="form-control" id="start_pm" placeholder="start_pm"  value="" >
        </div>	
    </div>
    <?php # /start_pm ?>

    <?php # end_pm ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_pm"><?php _t("End_pm"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="end_pm" class="form-control" id="end_pm" placeholder="end_pm"  value="" >
        </div>	
    </div>
    <?php # /end_pm ?>

    <?php # total_hours ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total_hours"><?php _t("Total_hours"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="total_hours" class="form-control" id="total_hours" placeholder="total_hours"  value="" >
        </div>	
    </div>
    <?php # /total_hours ?>

    <?php # project_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="project_id"><?php _t("Project_id"); ?></label>
        <div class="col-sm-8">
               <select name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true" >
                    
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
            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ></textarea>    <script>
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
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
               <select name="status" class="form-control selectpicker" id="status" data-live-search="true" >
                    
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
            <input type="text" name="year" class="form-control" id="year" placeholder="year"  value="" >
        </div>	
    </div>
    <?php # /year ?>

    <?php # month ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="month"><?php _t("Month"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="month" class="form-control" id="month" placeholder="month"  value="" >
        </div>	
    </div>
    <?php # /month ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
