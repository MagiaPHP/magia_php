<?php
# MagiaPHP 
# file date creation: 2024-06-09 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_work_status">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_work_status">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">



    <?php # work_status_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="work_status_code"><?php _t("Work status"); ?></label>
        <div class="col-sm-8">
            <select name="work_status_code" class="form-control selectpicker" id="work_status_code" data-live-search="true" >
                <?php //hr_work_status_select("code", array("code"), "", array()); ?>                        

                <?php
                foreach (hr_work_status_list() as $key => $hrwl) {
                    echo '<option value="' . $hrwl['code'] . '">' . _tr($hrwl['description']) . '</option>';
                }
                ?>



            </select>
        </div>	
    </div>
    <?php # /work_status_code ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start" value="" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
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
