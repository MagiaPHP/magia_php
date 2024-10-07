<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_civil_status">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $hr_employee_civil_status->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # employee_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t("Employee_id"); ?></label>
        <div class="col-sm-8">
            <select name="employee_id" class="form-control selectpicker" id="employee_id" data-live-search="true" >
                <?php employees_select("contact_id", array("contact_id"), $hr_employee_civil_status->getEmployee_id(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /employee_id ?>

    <?php # civil_status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="civil_status"><?php _t("Civil_status"); ?></label>
        <div class="col-sm-8">
            <select name="civil_status" class="form-control selectpicker" id="civil_status" data-live-search="true" >
                <?php hr_civil_status_select("code", array("code"), $hr_employee_civil_status->getCivil_status(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /civil_status ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start" value="<?php echo $hr_employee_civil_status->getDate_start(); ?>" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end" value="<?php echo $hr_employee_civil_status->getDate_end(); ?>" >
        </div>	
    </div>
    <?php # /date_end ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $hr_employee_civil_status->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($hr_employee_civil_status->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_employee_civil_status->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>

