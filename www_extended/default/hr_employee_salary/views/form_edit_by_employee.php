<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_salary">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $hr_employee_salary->getId(); ?>">
    <input type="hidden" name="employee_id" value="<?php echo $hr_employee_salary->getEmployee_id(); ?>">



    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_salary">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">



    <?php # month ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="month"><?php _t("Remuneration by month"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="month" class="form-control" id="month" placeholder="month" value="<?php echo $hr_employee_salary->getMonth(); ?>" >
        </div>	
    </div>
    <?php # /month ?>


    <?php # hour ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="hour"><?php _t("Remuneration by  hour"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="hour" class="form-control" id="hour" placeholder="hour" value="<?php echo $hr_employee_salary->getHour(); ?>" >
        </div>	
    </div>
    <?php # /hour ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start" value="<?php echo $hr_employee_salary->getDate_start(); ?>" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end" value="<?php echo $hr_employee_salary->getDate_end(); ?>" >
        </div>	
    </div>
    <?php # /date_end ?>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>

