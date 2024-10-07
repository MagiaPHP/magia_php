<?php
# MagiaPHP 
# file date creation: 2024-05-30 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_salary">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_salary">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">

    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">




    <?php # month ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="month"><?php _t("Remuneration by month"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="month" class="form-control" id="month" placeholder="month" value="" >
        </div>	
    </div>
    <?php # /month ?>

    <?php # hour ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="hour"><?php _t("Remuneration by hour"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="hour" class="form-control" id="hour" placeholder="hour" value="" >
        </div>	
    </div>
    <?php # /hour ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start" value=""

                   required="">
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end" value="" >
        </div>	
    </div>
    <?php # /date_end ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>
