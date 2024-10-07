<form method="post" action="index.php">

    <input type="hidden" name="c" value="hr_payroll">
    <input type="hidden" name="a" value="ok_add">            
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">                           
    <input type="hidden" name="redi[redi]" value="4">

    <div class="form-group">
        <label for="date_start"><?php _t("Date start"); ?></label>
        <input type="date" class="form-control" name="date_start" id="date_start" placeholder="" required="">
    </div>

    <div class="form-group">
        <label for="date_end"><?php _t("Date end"); ?></label>
        <input type="date" class="form-control" name="date_end" id="date_end" placeholder="" required="">
    </div>


    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Create"); ?>
    </button>
</form>