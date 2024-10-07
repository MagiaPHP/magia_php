<?php
# MagiaPHP 
# file date creation: 2024-05-30 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_civil_status">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_civil_status">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">


    <?php # civil_status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="civil_status"><?php _t("Civil_status"); ?></label>
        <div class="col-sm-8">
            <select name="civil_status" class="form-control selectpicker" id="civil_status" data-live-search="true" >
                <?php //hr_civil_status_select("code", array("code"), "", array()); ?>                        

                <?php
                foreach (hr_civil_status_list() as $key => $hrscl) {
                    echo '<option value="' . $hrscl['code'] . '">' . _tr($hrscl['description']) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /civil_status ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start" value=""
                   required=""
                   >
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
