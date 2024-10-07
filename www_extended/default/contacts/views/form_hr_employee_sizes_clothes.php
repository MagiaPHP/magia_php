
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_sizes_clothes">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    <input type="hidden" name="id" value="<?php echo $hr_employee_sizes_clothes_item['id']; ?>">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_sizes_clothes">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">


    <?php # clothes_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="clothes_code"><?php _t("Clothes"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="clothes_code" class="form-control" 
                   id="clothes_code" placeholder="clothes_code" value="<?php echo $hr_employee_sizes_clothes_item['clothes_code']; ?>"
                   readonly=""
                   >
        </div>	
    </div>
    <?php # /clothes_code ?>

    <?php # size ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="size"><?php _t("Size"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text" 
                name="size" 
                class="form-control" 
                id="size" 
                placeholder="size" 
                value="<?php echo $hr_employee_sizes_clothes_item['size']; ?>" 
                required=""
                >
        </div>	
    </div>
    <?php # /size ?>

    <?php # notes ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="" 
                      ><?php echo $hr_employee_sizes_clothes_item['notes']; ?></textarea>   


        </div>	
    </div>
    <?php # /notes ?>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>

