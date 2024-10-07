<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_work_status">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">


    <input type="hidden" name="employee_id" value="<?php echo $hr_employee_work_status_item['employee_id']; ?>">


    <input type="hidden" name="id" value="<?php echo $hr_employee_work_status_item['id']; ?>">
    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_work_status">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">



    <?php # work_status_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="work_status_code"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="text" 
                   name="" 
                   class="form-control" 
                   id="" 
                   placeholder="" 
                   value="<?php echo hr_work_status_field_code('description', $hr_employee_work_status_item['work_status_code']); ?>"
                   readonly=""
                   >

            <input type="hidden" 
                   name="work_status_code" 
                   class="form-control" 
                   id="work_status_code" 
                   placeholder="work_status_code" 
                   value="<?php echo $hr_employee_work_status_item['work_status_code']; ?>"
                   readonly=""
                   >

        </div>	
    </div>
    <?php # /work_status_code ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input
                type="date" 
                name="date_start" 
                class="form-control" 
                id="date_start" 
                placeholder="date_start" 
                value="<?php echo $hr_employee_work_status_item['date_start']; ?>" 
                required=""
                >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" 
                   name="date_end" 
                   class="form-control" 
                   id="date_end" 
                   placeholder="date_end" 
                   value="<?php echo $hr_employee_work_status_item['date_end']; ?>"
                   >
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

